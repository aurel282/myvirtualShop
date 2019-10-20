<?php

namespace App\Service;

use App\Models\Database\Product;
use App\Models\Database\Provider;
use App\Repository\ProductRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductService extends AbstractService
{
    /**
     * @var ProductRepository
     */
    protected $_productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        parent::__construct();
        $this->_productRepository = $productRepository;
    }

    public function getList(): Builder
    {
        return $this->_productRepository->getProductList();
    }

    public function getProduct(int $id) : Product
    {
        return new Product();
    }

    public function editProduct(Product $product, array $request): bool
    {
        return $this->_productRepository->edit($product, $request);
    }

    /**
     * @param array $data
     * @param int   $providerId
     *
     * @return Product
     */
    public function createProduct(array $data, int $providerId): Product
    {
        return $this->_productRepository->create($data, $providerId);
    }

    /**
     * @param Product $product
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteProduct(Product $product) : bool
    {
        return ($this->_productRepository->delete($product));
    }

    public function importFile(Request $request): array
    {

        $file = $request->file('file');
        $importData_arr = array();

        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        // Valid File Extensions
        $valid_extension = array("csv");

        // 2MB in Bytes
        $maxFileSize = 2097152;

        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)){

            // Check file size
            if($fileSize <= $maxFileSize){

                // File upload location
                $location = public_path().'/storage/uploads';

                // Upload file
                $file->move($location,$filename);

                // Import CSV to Database
                $filepath = $location."/".$filename;//public_path($location."/".$filename);

                //dd($filepath);

                // Reading file
                $file = fopen($filepath,"r");

                // To no get the title row
                fgetcsv($file, 1000, ",");

                while ($filedata = fgetcsv($file, 1000, ",")) {
                    array_push($importData_arr,
                        [
                            'name' => $filedata[0],
                            'description' => $filedata[4],
                            'quantity' => 1,
                            'price_per_unity' => $filedata[5],
                            'brand' => $filedata[1],
                            'color' => $filedata[2],
                            'material' => $filedata[3]
                        ]
                    );
                }

                fclose($file);
                unlink($filepath);
            }
        }
        return $importData_arr;
    }

    /**
     * @param array    $products
     * @param Provider $provider
     */
    public function bulkCreateProduct(array $products, Provider $provider)
    {
        // Insert to MySQL database
        foreach($products as $product)
        {
            $this->createProduct(
                $product,
                $provider->id
            );
        }
    }

    /**
     * @param Provider $provider
     *
     * @throws \Exception
     */
    public function bulkDeleteFromProvider(Provider $provider)
    {
        $allProductsFromProvider = $provider->products()->get();

        foreach($allProductsFromProvider as $product)
        {
            $this->_productRepository->delete($product);
        }
    }
}

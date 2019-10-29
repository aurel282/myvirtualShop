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

    public function getList(array $searchInfos): Builder
    {
        return $this->_productRepository->getProductList($searchInfos);
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
        $product = $this->_productRepository->create($data, $providerId);
        $code = $this->generateCode($product);
        $this->_productRepository->updateCode($product, $code);
        return $product;
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

                // Reading file
                $file = fopen($file,"r");

                // To no get the title row
                fgetcsv($file, 1000, ",");

                while ($filedata = fgetcsv($file, 1000, ",")) {
                    array_push($importData_arr,
                        [
                            'name' => utf8_encode($filedata[0]),
                            'description' => utf8_encode($filedata[4]),
                            'quantity' => 1,
                            'price_per_unity' => $filedata[5],
                            'brand' => utf8_encode($filedata[1]),
                            'color' => utf8_encode($filedata[2]),
                            'material' => utf8_encode($filedata[3])
                        ]
                    );
                }

                fclose($file);
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


    /**
     * @param Provider $provider
     */
    public function exportAllFromProvider(Provider $provider, string $filename)
    {
        $allProductsFromProvider = $provider->products()->get();

        $f = fopen('php://memory', 'w');
        // loop over the input array
        foreach ($allProductsFromProvider as $line) {
            $data =  [
                $line->name,
                '\'' . $line->code,
                $line->price_per_unity,
            ];
            // generate csv lines from the inner arrays
            fputcsv($f, $data, ',');
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename='. $filename .';');
        // make php send the generated csv lines to the browser
        fpassthru($f);
    }

    /**
     * @param Product $product
     */
    public function exportOneProduct(Product $product)
    {
        $f = fopen('php://memory', 'w');
        // loop over the input array
        $data =  [
            $product->name,
            '\'' .  $product->code,
            $product->price_per_unity,
        ];
        // generate csv lines from the inner arrays
        fputcsv($f, $data, ',');

        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename=Etiq_S;');
        // make php send the generated csv lines to the browser
        fpassthru($f);
    }


    /**
     * @param Product $product
     *
     * @return string
     */
    public function generateCode(Product $product): string
    {
        $price = (string)preg_replace( '/[^0-9]/', '', $product->price_per_unity );
        $product_id = (string)$product->id;
        $provider_id = (string)$product->provider_id;

         if (strlen($price) === 5){}
         elseif (strlen($price) === 4)
         {
             $price = '0' . $price;
         }
         elseif (strlen($price) === 3)
         {
             $price = '00' . $price;
         }
         elseif (strlen($price) === 2)
         {
             $price = '000' . $price;
         }
         elseif (strlen($price) === 1)
         {
             $price = '0000' . $price;
         }

       if (strlen($product_id) === 5){}
       elseif (strlen($product_id) === 4)
       {
           $product_id = '0' . $product_id;
       }
       elseif (strlen($product_id) === 3)
       {
           $product_id = '00' . $product_id;
       }
       elseif (strlen($product_id) === 2)
       {
           $product_id = '000' . $product_id;
       }
       elseif (strlen($product_id) === 1)
       {
           $product_id = '0000' . $product_id;
       }

        if (strlen($provider_id) === 3){}
        elseif (strlen($provider_id) === 2)
        {
            $provider_id = '0' . $provider_id;
        }
        elseif (strlen($provider_id) === 1)
        {
            $provider_id = '00' . $provider_id;
        }
        return $provider_id . $product_id . $price;
    }
}

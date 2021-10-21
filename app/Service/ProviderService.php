<?php

namespace App\Service;

use App\Models\Provider;
use App\Repository\AddressRepository;
use App\Repository\ProductRepository;
use App\Repository\ProviderRepository;
use App\Repository\SettingsRepository;
use App\ValueObjects\AddressValueObject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProviderService extends AbstractService
{
    /**
     * @var ProviderRepository
     */
    protected $_providerRepository;

    /**
     * @var SettingsRepository
     */
    protected $_settingsRepository;

    /**
     * @var ProductRepository
     */
    protected $_productRepository;

    /**
     * @var AddressRepository
     */
    protected $_addressRepository;

    public function __construct(
        ProviderRepository $providerRepository,
        AddressRepository $addressRepository,
        ProductRepository $productRepository,
        SettingsRepository $settingsRepository
    )
    {
        parent::__construct();
        $this->_providerRepository = $providerRepository;
        $this->_addressRepository = $addressRepository;
        $this->_productRepository = $productRepository;
        $this->_settingsRepository = $settingsRepository;;
    }

    public function getList(array $searchInfo): Builder
    {
        return $this->_providerRepository->getProviderList($searchInfo);
    }

    public function getProvider(int $id) : Provider
    {
        return new Provider();
    }

    public function editProvider(Provider $provider, array $request): bool
    {
        return $this->_providerRepository->edit($provider, $request);
    }

    /**
     * @param array $request
     * @param int   $addressId
     *
     * @return Provider
     */
    public function createProvider(array $request, int $addressId): Provider
    {
        return $this->_providerRepository->create($request, $addressId);
    }

    /**
     * @param array $datas
     */
    public function bulkCreateProvider(array $datas)
    {
        foreach ($datas as $data)
        {
            $addressValueObject = new AddressValueObject($data);
            $address = $this->_addressRepository->create($addressValueObject);
            $this->_providerRepository->create($data, $address->id);
        }
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
                            'lastname' => utf8_encode($filedata[0]),
                            'firstname' => utf8_encode($filedata[1]),
                            'email' => utf8_encode($filedata[7]),
                            'phone_number' => $filedata[2],
                            'mobile_number' => $filedata[3],
                            'street' => utf8_encode($filedata[5]),
                            'number' => $filedata[6] == ''? null : $filedata[6],
                            'city' => utf8_encode($filedata[4]),
                        ]
                    );
                }
                fclose($file);
            }
        }
        return $importData_arr;
    }

    /**
     * @param Provider $provider
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteProvider(Provider $provider) : bool
    {
        $allProductsFromProvider = $provider->products()->get();

        foreach($allProductsFromProvider as $product)
        {
            $this->_productRepository->delete($product);
        }

        $address = $provider->address;
        return ($this->_providerRepository->delete($provider) && $this->_addressRepository->delete($address));
    }

    /**
     * @param Provider $provider
     *
     * @return float
     */
    public function getTotalSoldByProvider(Provider $provider) : float
    {
        $total = 0;
        $products_sold = $this->_productRepository->getSoldByProvider($provider)->get();
        foreach ($products_sold as $product)
        {
            $total +=  $product->price_per_unity;
        }
        return $total;
    }

    /**
     * @return float
     */
    public function getTotalSold() : float
    {
        $total = 0;
        $products_sold = $this->_productRepository->getSold()->get();
        foreach ($products_sold as $product)
        {
            $total +=  $product->price_per_unity;
        }
        return $total;
    }


    public function exportAllProviders()
    {
        $providers = $this->getList([])->get();

        $f = fopen('php://memory', 'w');
        // loop over the input array
        foreach ($providers as $provider) {
            $data =  [
                $provider->id,
                utf8_encode($provider->name),
                utf8_encode($provider->firstname),
            ];
            // generate csv lines from the inner arrays
            fputcsv($f, $data, ',');
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename=providers.csv;');
        // make php send the generated csv lines to the browser
        fpassthru($f);
    }
    public function exportClotureProvider(Provider $provider)
    {
        $settings = $this->_settingsRepository->getSettings();

        $products_sold = $this->_productRepository->getSoldByProvider($provider)->get();
        $products_unsold = $this->_productRepository->getUnsoldByProvider($provider)->get();

        $total_sold = $this->getTotalSoldByProvider($provider);

        $f = fopen('php://memory', 'w');
        // loop over the input array
        $data =  [
            $provider->id,
            utf8_encode($provider->name),
            utf8_encode($provider->firstname),
        ];
        // generate csv lines from the inner arrays
        fputcsv($f, $data, ',');
        fputcsv($f, [], ',');

        fputcsv($f, ['Total vendu'], ',');
        fputcsv($f, [$total_sold], ',');
        fputcsv($f, ['Part Solidalys'], ',');
        fputcsv($f, [$total_sold * $settings->variable_fee], ',');
        fputcsv($f, ['A rendre'], ',');
        fputcsv($f, [$total_sold - ($total_sold * $settings->variable_fee) - $settings->fixed_fee], ',');
        fputcsv($f, [], ',');

        fputcsv($f, ['Vendu: '. count($products_sold)], ',');

        foreach ($products_sold as $product_sold) {
            $data =  [
                $product_sold->price_per_unity,
                utf8_encode($product_sold->name),
                utf8_encode('\'' .$product_sold->code),
            ];
            // generate csv lines from the inner arrays
            fputcsv($f, $data, ',');
        }

        fputcsv($f, [], ',');
        fputcsv($f, ['Invendu:' . count($products_unsold)], ',');
        foreach ($products_unsold as $product_unsold) {
            $data =  [
                $product_unsold->price_per_unity,
                utf8_encode($product_unsold->name),
                utf8_encode('\'' . $product_unsold->code),
            ];
            // generate csv lines from the inner arrays
            fputcsv($f, $data, ',');
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename=providers.csv;');
        // make php send the generated csv lines to the browser
        fpassthru($f);
    }
}

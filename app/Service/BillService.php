<?php

namespace App\Service;

use App\Models\Database\Bill;
use App\Models\Database\Client;
use App\Repository\BillRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BillService extends AbstractService
{
    /**
     * @var BillRepository
     */
    protected $_billRepository;



    public function __construct(BillRepository $billRepository)
    {
        parent::__construct();
        $this->_billRepository = $billRepository;
    }

    public function createBill(Client $client): Bill
    {
        return $this->_billRepository->create($client);
    }

    public function getList(): Builder
    {
        return $this->_billRepository->getList();
    }

    public function exportBill(Bill $bill)
    {

        $purchases = $bill->purchases()->get();
        $client = $bill->client();

        //$total_sold = $this->getTotalSold($provider);

        $f = fopen('php://memory', 'w');
        // loop over the input array
        $data =  [
            $client->id,
            utf8_encode($client->name),
            utf8_encode($client->firstname),
        ];
        // generate csv lines from the inner arrays
        fputcsv($f, $data, ',');
        fputcsv($f, [], ',');

        fputcsv($f, ['Total Titcket'], ',');
        fputcsv($f, [$total_sold], ',');


        fputcsv($f, ['Articles: '. count($products_sold)], ',');

        foreach ($products_sold as $product_sold) {
            $data =  [
                $product_sold->price_per_unity,
                utf8_encode($product_sold->name),
                utf8_encode($product_sold->code),
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

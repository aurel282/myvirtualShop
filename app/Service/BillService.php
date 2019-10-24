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
}

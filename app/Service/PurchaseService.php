<?php

namespace App\Service;

use App\Models\Database\Product;
use App\Models\Database\Provider;
use App\Models\Database\Purchase;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PurchaseService extends AbstractService
{
    /**
     * @var PurchaseRepository
     */
    protected $_purchaseRepository;

    public function __construct(
        PurchaseRepository $purchaseRepository
    )
    {
        parent::__construct();
        $this->_purchaseRepository = $purchaseRepository;
    }

    public function getList(): Builder
    {
        return $this->_purchaseRepository->getPurchaseList();
    }


    public function getPurchase(int $id) : Purchase
    {
        return new Purchase();
    }


}

<?php

namespace App\Service;

use App\Models\Database\Bill;
use App\Models\Database\Purchase;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use Illuminate\Database\Eloquent\Builder;

class PurchaseService extends AbstractService
{
    /**
     * @var PurchaseRepository
     */
    protected $_purchaseRepository;
    /**
     * @var ProductRepository
     */
    protected $_productRepository;

    public function __construct(
        PurchaseRepository $purchaseRepository,
        ProductRepository $productRepository
    )
    {
        parent::__construct();
        $this->_purchaseRepository = $purchaseRepository;
        $this->_productRepository = $productRepository;
    }

    public function getList(): Builder
    {
        return $this->_purchaseRepository->getPurchaseList();
    }


    public function getPurchase(int $id) : Purchase
    {
        return new Purchase();
    }

    public function canBepurchased(string $code, int $quantity) : bool
    {
        $product = $this->_productRepository->getProductFromCode($code)->first();
        return $product->quantity >= $quantity;
    }

    /**
     * @param Bill  $bill
     * @param array $request
     *
     * @return Purchase|null
     */
    public function createPurchase(Bill $bill, array $request) : ?Purchase
    {
        $product = $this->_productRepository->getProductFromCode($request['code'])->first();
        if($product)
        {
            return $this->_purchaseRepository->create($bill, $product, $request[ 'quantity' ]);
        }
        else
        {
            return null;
        }
    }

    /**
     * @param Bill     $bill
     * @param Purchase $purchase
     *
     * @return bool
     * @throws \Exception
     */
    public function deletePurchase(Purchase $purchase): bool
    {
        $product = $purchase->product()->first();
        $quantity = $purchase->quantity;
        if($this->_purchaseRepository->delete($purchase))
        {
            return $this->_productRepository->addQuantity($product->code,  $quantity );
        }
        else
        {
            return false;
        }
    }

    public function deleteAllPurchase()
    {
        $purchases = $this->_purchaseRepository->getAllPurchase()->get();
        foreach ($purchases as $purchase)
        {
            $this->_purchaseRepository->delete($purchase);
        }
    }


}

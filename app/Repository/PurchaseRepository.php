<?php

namespace App\Repository;


use App\Models\Bill;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Builder;

class PurchaseRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Builder
     */
    public function getPurchaseList(): Builder
    {
        return Purchase::query();
    }


    /**
     * @return Builder
     */
    public function getAllPurchase(): Builder
    {
        return Purchase::query();
    }


    /**
     * @param Bill    $bill
     * @param Product $product
     * @param int     $quantity
     *
     * @return Purchase
     */
    public function create(Bill $bill, Product $product, int $quantity): Purchase
    {
        return Purchase::create([
            'product_id' => $product->id,
            'bill_id' => $bill->id,
            'quantity' => $quantity,
        ]);
    }

    /**
     * @return int
     */
    public function getPurchaseNumber(): int
    {
        return Purchase::query()->count();
    }

    /**
     * @param Purchase $purchase
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(Purchase $purchase): bool
    {
        return $purchase->delete();
    }



}

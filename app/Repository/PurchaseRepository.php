<?php

namespace App\Repository;


use App\Models\Database\Product;
use App\Models\Database\Purchase;
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

    public function getPurchaseList(): Builder
    {
        return Purchase::query();
    }


}

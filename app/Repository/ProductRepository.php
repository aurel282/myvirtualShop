<?php

namespace App\Repository;


use App\Models\Database\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function  getProductList(): Builder
    {
        return Product::query();
    }

}

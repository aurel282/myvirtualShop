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

    /*
    public function editProduct(Product $product, array $request): bool
    {
        return $this->_productRepository->edit($product, $request);
    }
    */

    /**
     * @param array $data
     * @param int   $providerId
     *
     * @return Product
     */
    /*
    public function createProduct(array $data, int $providerId): Product
    {
        return $this->_productRepository->create($data, $providerId);
    }
    */

    /**
     * @param Product $product
     *
     * @return bool
     * @throws \Exception
     */
    /*
    public function deleteProduct(Product $product) : bool
    {
        return ($this->_productRepository->delete($product));
    }
    */


    /**
     * @param Provider $provider
     *
     * @throws \Exception
     */
    /*
    public function bulkDeleteFromProvider(Provider $provider)
    {
        $allProductsFromProvider = $provider->products()->get();

        foreach($allProductsFromProvider as $product)
        {
            $this->_productRepository->delete($product);
        }
    }
    */
}

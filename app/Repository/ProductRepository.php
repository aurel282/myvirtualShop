<?php

namespace App\Repository;


use App\Models\Database\Product;
use App\Models\Database\Provider;
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

    public function getProductList(array $searchInfos): Builder
    {
        $query = Product::query();

        if (isset($searchInfos[ 'product_name' ]))
        {
            $query->where('name', 'like', '%' . $searchInfos[ 'product_name' ] . '%');
        }

        if (isset($searchInfos[ 'product_code' ]))
        {
            $query->where('code', 'like', '%' . $searchInfos[ 'product_code' ] . '%');
        }

        return $query;
    }

    /**
     * @param string $code
     *
     * @return Builder
     */
    public function getProductFromCode(string $code): Builder
    {
        return Product::query()
                      ->where('code', $code);
    }

    /**
     * @param Provider $provider
     *
     * @return Builder
     */
    public function getSoldByProvider(Provider $provider): Builder
    {
        return Product::query()
                      ->where('provider_id', $provider->id)
                      ->where('quantity', 0);
    }

    /**
     * @return int
     */
    public function getCountDifferentProvider(): int
    {
        return Product::query()->distinct('provider_id')->count();
    }

    /**
     * @param Provider $provider
     *
     * @return Builder
     */
    public function  getUnsoldByProvider(Provider $provider) : Builder
    {
        return Product::query()
                      ->where('provider_id' , $provider->id)
                      ->where('quantity' , '>', 0);
    }

    /**
     * @param array $data
     * @param int   $providerId
     *
     * @return Product
     */
    public function create(array $data, int $providerId): Product
    {
        return Product::create([
            'name' => $data['name'],
            'description' => isset($data['description']) ? $data['description'] : '' ,
            'provider_id' => $providerId,
            'quantity' => $data['quantity'],
            'price_per_unity' => $data['price_per_unity'],
            'brand' => isset($data['brand']) ? $data['brand'] : '',
            'color' => isset($data['color']) ? $data['color'] : '',
            'material' => isset($data['material']) ? $data['material'] : '',
        ]);
    }

    /**
     * @param Product $product
     * @param array   $request
     *
     * @return bool
     */
    public function edit(Product $product, array $request): bool
    {
        return $product->update([
            'name' => $request['name'],
            'description' => isset($request['description']) ? $request['description'] : '' ,
            'quantity' => $request['quantity'],
            'price_per_unity' => $request['price_per_unity'],
            'brand' => isset($request['brand']) ? $request['brand'] : '',
            'color' => isset($request['color']) ? $request['color'] : '',
            'material' => isset($request['material']) ? $request['material'] : '',
        ]);
    }

    /**
     * @param string $code
     * @param int    $quantity
     *
     * @return bool
     */
    public function subQuantity(string $code, int $quantity): bool
    {
        $product = $this->getProductFromCode($code)->first();
        return $product->update([
            'quantity' => $product->quantity - $quantity,
        ]);
    }

    /**
     * @param string $code
     * @param int    $quantity
     *
     * @return bool
     */
    public function addQuantity(string $code, int $quantity): bool
    {
        $product = $this->getProductFromCode($code)->first();
        return $product->update([
            'quantity' => $product->quantity + $quantity,
        ]);
    }

    /**
     * @param Product $product
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function updateCode(Product $product, string $code): bool
    {
        return $product->update(
            [
                'code' => $code
            ]
        );
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Provider;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function getList(
        Request $request,
        ProductService $productService
    )
    {
        $products = $productService->getList($request->all())
                                 ->paginate(15);

        return view(
            'product.list',
            [
                'products' => $products,
            ]
        );
    }

    public function postDelete(
        Product $product,
        ProductService $productService
    )
    {
        $products = $productService->getList([])
                                   ->paginate(15);

        $productService->deleteProduct($product);

        return view(
            'product.list',
            [
                'products' => $products,
            ]
        );
    }

    public function postDeleteFromProvider(
        Provider $provider,
        Product $product,
        ProductService $productService
    )
    {
        $productService->deleteProduct($product);

        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function show(Product $product)
    {
        return view(
            'product.show',
            [
                'product' => $product,
            ]
        );
    }

    public function getCreate(Provider $provider)
    {
        return view(
            'product.create',
            [
                'provider' => $provider
            ]
        );
    }

    public function postCreate(
        CreateProductRequest $request,
        ProductService $productService,
        Provider $provider
    )
    {

        $product = $productService->createProduct($request->all(), $provider->id);

        if(array_key_exists('print_code', $request->all()))
        {
            $productService->exportOneProduct($product);
        }

        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function getEditFromProvider(
        Provider $provider,
        Product $product
    )
    {
        return view(
            'product.edit',
            [
                'provider' =>$provider,
                'product' => $product
            ]
        );
    }

    public function postEditFromProvider(
        UpdateProductRequest $request,
        Provider $provider,
        Product $product,
        ProductService $productService
    )
    {

        $productService->editProduct($product, $request->all());

        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function getEdit(Product $product)
    {
        return view(
            'product.edit',
            [
                'product' => $product
            ]
        );
    }

    public function postEdit(
        UpdateProductRequest $request,
        Product $product,
        ProductService $productService
    )
    {

        $productService->editProduct($product, $request->all());

        $products = $productService->getList([])
                                   ->paginate(15);

        return view(
            'product.list',
            [
                'products' => $products,
            ]
        );
    }

    public function getImport(Provider $provider)
    {
        return view(
            'import.products',
            [
                'provider' => $provider
            ]
        );
    }

    public function postImport(
        Request $request,
        Provider $provider,
        ProductService $productService
    )  : View
    {
        if ($request->input('submit')){

            $datas = $productService->importFile($request);
            $productService->bulkCreateProduct($datas, $provider);
        }

        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function bulkDeleteFromProvider(
        Provider $provider,
        ProductService $productService
    ) : View
    {
        $productService->bulkDeleteFromProvider($provider);

        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function exportAllProductFromProvider(
        Provider $provider,
        ProductService $productService
    )
    {
        $productService->exportAllFromProvider($provider,'Product_'. $provider->id .'.csv');
    }

    public function exportAllProductFromProviderBarCode(
        Provider $provider,
        ProductService $productService
    )
    {
        $productService->exportAllFromProvider($provider, 'Etiq_T.csv');
    }

    public function exportOneProduct(
        Product $product,
        ProductService $productService
    )
    {
        $productService->exportOneProduct($product);
    }
}

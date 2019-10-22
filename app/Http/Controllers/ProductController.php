<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Database\Product;
use App\Models\Database\Provider;
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
        $products = $productService->getList()
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
        $products = $productService->getList()
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

        $productService->createProduct($request->all(), $provider->id);


        $providers = $productService->getList()
                                 ->paginate(15);

        return view(
            'product.list',
            [
                'product' => $providers,
            ]
        );
    }

    public function getEditFromProvider(
        Product $product,
        Provider $provider
    )
    {
        return view(
            'product.edit',
            [
                'product' => $product
            ]
        );
    }

    public function postEditFromProvider(
        UpdateProductRequest $request,
        Product $product,
        Provider $provider,
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

        $products = $productService->getList()
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
    ) : View
    {
        $productService->exportAllFromProvider($provider);



        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Models\Database\Product;
use App\Models\Database\Provider;
use App\Service\AddressService;
use App\Service\ProductService;
use App\Service\ProviderService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
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
            'provider.list',
            [
                'providers' => $providers,
            ]
        );
    }

    public function getEdit(Provider $provider)
    {
        return view(
            'provider.edit',
            [
                'provider' => $provider
            ]
        );
    }

    public function postEdit(
        UpdateProviderRequest $request,
        Provider $provider,
        ProviderService $providerService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $addressService->editAddress($provider->address, $addressValueObject);

        $providerService->editProvider($provider, $request->all());

        $providers = $providerService->getList()
                                 ->paginate(15);

        return view(
            'provider.list',
            [
                'providers' => $providers,
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

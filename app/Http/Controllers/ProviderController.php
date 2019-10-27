<?php

namespace App\Http\Controllers;

use App\Http\Requests\Provider\CreateProviderRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Models\Database\Provider;
use App\Service\AddressService;
use App\Service\ProviderService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getList(
        Request $request,
        ProviderService $providerService
    )
    {
        //dd($request->all());

        $providers = $providerService->getList($request->all())
                                 ->paginate(15);

        return view(
            'provider.list',
            [
                'providers' => $providers,
            ]
        );
    }

    public function show(Provider $provider)
    {
        return view(
            'provider.show',
            [
                'provider' => $provider,
            ]
        );
    }

    public function getCreate(Request $request)
    {
        return view(
            'provider.create'
        );
    }

    public function postCreate(
        CreateProviderRequest $request,
        ProviderService $providerService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $address = $addressService->createAddress($addressValueObject);

        $providerService->createProvider($request->all(), $address->id);


        $providers = $providerService->getList([])
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

        $providers = $providerService->getList([])
                                 ->paginate(15);

        return view(
            'provider.list',
            [
                'providers' => $providers,
            ]
        );
    }

    public function getImport()
    {
        return view(
            'import.providers'
        );
    }

    public function postImport(
        Request $request,
        ProviderService $providerService
    )
    {
        if ($request->input('submit')){

            $datas = $providerService->importFile($request);
            $providerService->bulkCreateProvider($datas);
        }

        $providers = $providerService->getList([])
                                 ->paginate(15);

        return view(
            'provider.list',
            [
                'providers' => $providers,
            ]
        );
    }

    public function getExportAll(
        Request $request,
        ProviderService $providerService
    )
    {
        $providerService->exportAllProviders();
    }

    public function getExportClotureByProvider(
        Provider $provider,
        ProviderService $providerService
    )
    {
        $providerService->exportClotureProvider($provider);
    }
}

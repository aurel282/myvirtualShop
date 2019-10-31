<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClientRequest;
use App\Models\Database\Client;
use App\Service\AddressService;
use App\Service\ClientService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function getList(
        Request $request,
        ClientService $clientService
    )
    {
        $clients = $clientService->getList($request->all())
                ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function show(Client $client)
    {
        return view(
            'client.show',
            [
                'client' => $client,
            ]
        );
    }

    public function getCreate(Request $request)
    {
        return view(
            'client.create'
        );
    }

    public function postCreate(
        CreateClientRequest $request,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $address = $addressService->createAddress($addressValueObject);

        $clientService->createClient($request->all(), $address->id);


        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function getEdit(Client $client)
    {
        return view(
            'client.edit',
            [
                'client' => $client
            ]
        );
    }

    public function postEdit(
        CreateClientRequest $request,
        Client $client,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $addressService->editAddress($client->address, $addressValueObject);

        $clientService->editClient($client, $request->all());

        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function getImport()
    {
        return view(
            'import.clients'
        );
    }

    public function postImport(
        Request $request,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function getDelete(
        ClientService $clientService,
        Client $client
    )
    {
        $clientService->deleteClient($client);

        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Database\Client;
use App\Service\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function getList(
        Request $request,
        ClientService $clientService
    )
    {
        $clients = $clientService->getList()
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
        Request $request,
        ClientService $clientService
    )
    {
        $clientService->createClient($request);

    }
}

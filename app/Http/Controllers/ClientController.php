<?php

namespace App\Http\Controllers;

use App\Service\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getList(
        Request $request,
        ClientService $clientService
    )
    {
        $clients = $clientService->getList()->get();

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function show()
    {
        return view(
            'client.show',
            []
        );
    }
}

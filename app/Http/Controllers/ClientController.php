<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    public function list()
    {
        return view(
            'client.list',
            []
        );
    }

    public function show()
    {
        return view(
            'client.list',
            []
        );
    }
}

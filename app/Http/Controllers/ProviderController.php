<?php

namespace App\Http\Controllers;

class ProviderController extends Controller
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
            'client.show',
            []
        );
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Database\Bill;
use App\Models\Database\Client;
use App\Service\BillService;

class BillController extends Controller
{
    public function show(
        Bill $bill
    )
    {
        return view(
            'bill.show',
            [
                'bill' => $bill,
            ]
        );
    }

    public function postCreateFromClient(
        BillService $billService,
        Client $client
    )
    {

        $bill = $billService->createBill($client);

        return view(
            'bill.show',
            [
                'bill' => $bill,
            ]
        );
    }

    public function deleteFromClient(
        Client $client,
        Bill $bill
    )
    {
        return view(
            'bill.show',
            [
                'bill' => $bill,
            ]
        );
    }
}

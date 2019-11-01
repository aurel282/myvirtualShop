<?php

namespace App\Http\Controllers;


use App\Models\Database\Bill;
use App\Models\Database\Client;
use App\Service\BillService;

class BillController extends Controller
{

    public function getList(
        BillService $billService
    )
    {
        $bills = $billService->getList([])
            ->paginate(15);;


        return view(
            'bill.list',
            [
                'bills' => $bills,
            ]
        );
    }


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

    public function getCSVFromBill(
        BillService $billService,
        Bill $bill
    )
    {
        $billService->exportBill($bill);
    }
}

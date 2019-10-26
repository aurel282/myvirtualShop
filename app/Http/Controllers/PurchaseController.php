<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Http\Requests\Purchase\CreatePurchaseRequest;
use App\Models\Database\Bill;
use App\Models\Database\Client;
use App\Models\Database\Product;
use App\Models\Database\Provider;
use App\Models\Database\Purchase;
use App\Repository\ProductRepository;
use App\Service\AddressService;
use App\Service\ProductService;
use App\Service\ProviderService;
use App\Service\PurchaseService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PurchaseController extends Controller
{
    public function getList(
        Request $request,
         PurchaseService $purchaseService
    )
    {
        $purchases = $purchaseService->getList()
                                 ->paginate(15);

        return view(
            'purchase.list',
            [
                'purchases' => $purchases,
            ]
        );
    }

    public function show(Purchase $purchase)
    {
        return view(
            'purchase.show',
            [
                'purchase' => $purchase,
            ]
        );
    }

    public function getAdd(Bill $bill)
    {
        return view(
            'purchase.create',
            [
                'bill' => $bill
            ]
        );
    }

    public function postAdd(
        CreatePurchaseRequest $request,
        PurchaseService $purchaseService,
        ProductRepository $productRepository,
        Bill $bill
    )
    {
        if($purchaseService->canBepurchased($request['code'], $request['quantity']))
        {
            if ($purchaseService->createPurchase($bill, $request->all()))
            {
                $productRepository->editQuantity($request['code'], $request['quantity']);
            }
        }

        return view(
            'bill.show',
            [
                'bill' => $bill,
            ]
        );
    }


    public function getDeleteFromBill(
        Bill $bill,
        Purchase $purchase,
        PurchaseService $purchaseService
    ) : View
    {
        $purchaseService->deletePurchase($bill, $purchase);

        return view(
            'bill.show',
            [
                'bill' => $bill,
            ]
        );
    }
}

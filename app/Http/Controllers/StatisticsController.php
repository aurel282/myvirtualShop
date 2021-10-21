<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Http\Requests\Purchase\CreatePurchaseRequest;
use App\Http\Requests\Settings\UpdateSettingsRequest;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Repository\ProductRepository;
use App\Service\AddressService;
use App\Service\BillService;
use App\Service\ProductService;
use App\Service\ProviderService;
use App\Service\PurchaseService;
use App\Service\SettingsService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticsController extends Controller
{

    public function show(
        SettingsService $settingsService,
        ProviderService $providerService,
        ProductService $productService,
        PurchaseService $purchaseService,
        BillService $billService
    )
    {
        return view(
            'statistics.show',
            [
                'settings' => $settingsService->getSettings(),
                'nb_providers' => $productService->getCountDifferentProvider(),
                'nb_products' => $productService->getProductNumber(),
                'nb_bills' => $billService->getList([])->count(),
                'nb_purchases' => $purchaseService->getPurchaseNumber(),
                'total_purchases' => $providerService->getTotalSold(),
                'total_commission_purchases' => $providerService->getTotalSold() * $settingsService->getSettings()->variable_fee,
                'total_commission_providers' => $productService->getCountDifferentProvider() * $settingsService->getSettings()->fixed_fee,
            ]
        );
    }
}

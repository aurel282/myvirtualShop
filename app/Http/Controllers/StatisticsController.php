<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Provider\UpdateProviderRequest;
use App\Http\Requests\Purchase\CreatePurchaseRequest;
use App\Http\Requests\Settings\UpdateSettingsRequest;
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
use App\Service\SettingsService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticsController extends Controller
{

    public function show(
        SettingsService $settingsService,
        ProviderService $providerService,
        ProductService $productService
    )
    {
        return view(
            'statistics.show',
            [
                'settings' => $settingsService->getSettings(),
                'nb_providers' => $productService->getCountDifferentProvider(),
                'nb_products' => $productService->getProductNumber(),
                'nb_bills' => $productService->getProductNumber(),
                'nb_purchases' => $productService->getProductNumber(),
                'total_purchases' => $productService->getProductNumber(),
                'total_commission_purchases' => $productService->getProductNumber(),
            ]
        );
    }
}

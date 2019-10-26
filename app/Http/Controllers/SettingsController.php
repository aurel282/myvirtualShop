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

class SettingsController extends Controller
{

    public function show(
        SettingsService $settingsService
    )
    {
        return view(
            'settings.show',
            [
                'settings' => $settingsService->getSettings()
            ]
        );
    }

    public function getEdit(
        SettingsService $settingsService
    )
    {
        return view(
            'settings.edit',
            [
                'settings' => $settingsService->getSettings()
            ]
        );
    }

    public function postEdit(
        UpdateSettingsRequest $request,
        SettingsService $settingsService
    )
    {
        $settingsService->updateSetting($request['fixed_fee'], $request['variable_fee']);

        return view(
            'settings.show',
            [
                'settings' => $settingsService->getSettings()
            ]
        );
    }
}

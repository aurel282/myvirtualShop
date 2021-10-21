<?php

namespace App\Repository;


use App\Models\Bill;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;

class SettingsRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Setting|null
     */
    public function getSettings(): ?Setting
    {
        return Setting::query()->first();
    }

    /**
     * @param Setting $setting
     * @param float   $fixed_fee
     * @param float   $variable_fee
     *
     * @return bool
     */
    public function update(Setting $setting, float $fixed_fee, float $variable_fee): bool
    {
        return $setting->update([
            'fixed_fee' => $fixed_fee,
            'variable_fee' => $variable_fee,
        ]);
    }
}

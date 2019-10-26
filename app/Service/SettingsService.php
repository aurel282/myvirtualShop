<?php

namespace App\Service;

use App\Models\Database\Bill;
use App\Models\Database\Purchase;
use App\Models\Database\Setting;
use App\Repository\ProductRepository;
use App\Repository\PurchaseRepository;
use App\Repository\SettingsRepository;
use Illuminate\Database\Eloquent\Builder;

class SettingsService extends AbstractService
{
    /**
     * @var SettingsRepository
     */
    protected $_settingsRepository;


    public function __construct(
        SettingsRepository $settingsRepository
    )
    {
        parent::__construct();
        $this->_settingsRepository = $settingsRepository;
    }

    public function getSettings(): Setting
    {
        return $this->_settingsRepository->getSettings();
    }

    public function updateSetting(float $fixed_fee, float $variable_fee): bool
    {
        return $this->_settingsRepository->update($this->getSettings(), $fixed_fee, $variable_fee);
    }




}

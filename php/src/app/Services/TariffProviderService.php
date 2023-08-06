<?php

namespace app\Services;

use App\Contracts\TariffProvider;

class TariffProviderService implements TariffProvider
{

    private static $instance;

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }
    public function getTariffs(): array
    {
        // Code to fetch and parse tariff data from the external provider
        // Mocking the data for task purposes
        return [
            ["name" => "Product A", "type" => 1, "baseCost" => 5, "additionalKwhCost" => 22],
            ["name" => "Product B", "type" => 2, "includedKwh" => 4000, "baseCost" => 800, "additionalKwhCost" => 30],
        ];
    }
}
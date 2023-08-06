<?php

namespace App\Http\Controllers;

use App\Services\TariffProviderService;
use App\Services\ElectricityPriceCalculatorFactory;
class ElectricityPriceController extends Controller
{
    public function comparePrices(float $consumption)
    {
        $tariffs = TariffProviderService::getInstance()->getTariffs();
        $calculatorFactory = new ElectricityPriceCalculatorFactory();

        $results = [];

        foreach ($tariffs as $tariff) {
            $valuesArray = array_diff_key($tariff, array_flip(["name", "type"]));
            $calculator = $calculatorFactory->createCalculator($tariff['type'], $valuesArray);
            $cost = $calculator->calculate($consumption);

            $results[] = [
                "Tariff name" => $tariff["name"],
                "Annual costs (€/year)" => $cost,
            ];
        }

        // Sort the results by costs in ascending order
        usort($results, function ($a, $b) {
            return $a["Annual costs (€/year)"] <=> $b["Annual costs (€/year)"];
        });

        return response()->json($results);
    }
}
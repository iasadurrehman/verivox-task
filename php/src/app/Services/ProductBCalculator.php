<?php

namespace app\Services;

use App\Contracts\ElectricityPriceCalculatorInterface;

class ProductBCalculator implements ElectricityPriceCalculatorInterface
{
    public function __construct(protected array $values)
    {
    }

    public function calculate(float $consumption): float
    {
        $includedKwh = $this->values['includedKwh'];
        $baseCost = $this->values['baseCost'];
        $additionalKwhCost = $this->values['additionalKwhCost'] / 100;

        if ($consumption <= $includedKwh) {
            return $baseCost;
        }

        $additionalConsumption = $consumption - $includedKwh;
        return $baseCost + $additionalConsumption * $additionalKwhCost;
    }
}
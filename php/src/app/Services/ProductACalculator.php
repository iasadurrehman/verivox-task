<?php

namespace app\Services;

use App\Contracts\ElectricityPriceCalculatorInterface;

class ProductACalculator implements ElectricityPriceCalculatorInterface
{
    public function __construct(protected array $values)
    {
    }

    public function calculate(float $consumption): float
    {
        $baseCost = $this->values['baseCost'];
        $additionalKwhCost = $this->values['additionalKwhCost'] / 100;
        return $baseCost * 12 + $consumption * $additionalKwhCost;
    }
}
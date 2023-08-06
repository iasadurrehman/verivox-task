<?php

namespace App\Services;

use App\Contracts\ElectricityPriceCalculatorInterface;

class ElectricityPriceCalculatorFactory
{
    public function createCalculator(int $tariffType, $values): ElectricityPriceCalculatorInterface
    {
        return match ($tariffType) {
            1 => new ProductACalculator($values),
            2 => new ProductBCalculator($values),
            default => throw new \InvalidArgumentException("Unsupported tariff type: $tariffType"),
        };
    }
}
<?php

namespace App\Contracts;

interface ElectricityPriceCalculatorInterface
{
    public function calculate(float $consumption): float;
}
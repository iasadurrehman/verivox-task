<?php

namespace App\Contracts;

interface TariffProvider
{
    public function getTariffs(): array;
}
<?php

namespace Tests\Concerns;

use Pleets\Units\Units\InformationUnit;
use Pleets\Units\Units\TimeUnit;

trait HasUnits
{
    public function singleTimeUnitsProvider(): array
    {
        $provider = [];

        foreach (TimeUnit::toArray() as $unit) {
            $provider[$unit] = [$unit];
        }

        return $provider;
    }

    public function singleInformationUnitsProvider(): array
    {
        $provider = [];

        foreach (InformationUnit::toArray() as $unit) {
            $provider[$unit] = [$unit];
        }

        return $provider;
    }
}

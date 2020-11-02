<?php

namespace Tests\Concerns;

use Pleets\Units\Units\TimeUnit;

trait HasUnits
{
    public function singleUnitToUnitsProvider(): array
    {
        $provider = [];

        foreach (TimeUnit::toArray() as $unit) {
            $provider[$unit] = [$unit];
        }

        return $provider;
    }
}

<?php

namespace Tests\Concerns;

use Pleets\Units\Units\InformationUnit;
use Pleets\Units\Units\Sets\TimeUnitSet;
use Pleets\Units\Units\TimeUnit;
use Tests\Units\InformationUnitSetSet;

trait HasUnitSets
{
    public function unitSetsProvider(): array
    {
        return [
            'Time' => [
                TimeUnit::class,
                TimeUnitSet::class,
            ],
            'Information' => [
                InformationUnit::class,
                InformationUnitSetSet::class
            ]
        ];
    }
}

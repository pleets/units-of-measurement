<?php

namespace Tests\Concerns;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Symbols\Sets\InformationSymbolSetSet;
use Pleets\Units\Symbols\Sets\TimeSymbolSetSet;
use Pleets\Units\Symbols\TimeSymbol;

trait HasSymbolSets
{
    public function symbolSetsProvider(): array
    {
        return [
            'Time' => [
                TimeSymbol::class,
                TimeSymbolSetSet::class,
            ],
            'Information' => [
                InformationSymbol::class,
                InformationSymbolSetSet::class
            ]
        ];
    }
}

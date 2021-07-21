<?php

namespace Tests\Concerns;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\InformationUnit;
use Pleets\Units\Units\TimeUnit;

trait HasUnitsAndSymbols
{
    public function unitsAndSymbolsProvider(): array
    {
        return [
            'Time' => [
                TimeUnit::class,
                TimeSymbol::class,
            ],
            'Information' => [
                InformationUnit::class,
                InformationSymbol::class
            ]
        ];
    }
}

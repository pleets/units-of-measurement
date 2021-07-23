<?php

namespace Tests\Concerns;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Symbols\Sets\InformationSymbolSet;
use Pleets\Units\Symbols\Sets\TimeSymbolSet;
use Pleets\Units\Symbols\TimeSymbol;

trait HasSymbolSets
{
    public function symbolSetsProvider(): array
    {
        return [
            'Time' => [
                TimeSymbol::class,
                TimeSymbolSet::class,
            ],
            'Information' => [
                InformationSymbol::class,
                InformationSymbolSet::class
            ]
        ];
    }
}

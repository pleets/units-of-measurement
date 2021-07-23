<?php

namespace Pleets\Units\Symbols\Sets;

use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

class TimeSymbolSet extends BaseSymbolSet
{
    protected function symbol(): string
    {
        return TimeSymbol::class;
    }

    protected function unit(): string
    {
        return TimeUnit::class;
    }
}

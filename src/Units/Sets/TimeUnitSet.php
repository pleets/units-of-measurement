<?php

namespace Pleets\Units\Units\Sets;

use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

class TimeUnitSet extends BaseUnitSet
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

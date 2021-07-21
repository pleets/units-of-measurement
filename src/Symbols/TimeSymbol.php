<?php

namespace Pleets\Units\Symbols;

use Pleets\Units\Units\TimeUnit;

class TimeSymbol extends BaseSymbol
{
    public const SECOND = 's';
    public const MINUTE = 'min';
    public const HOUR   = 'h';
    public const DAY    = 'd';
    public const WEEK   = 'w';
    public const MONTH  = 'm';
    public const YEAR   = 'y';

    protected static function unit(): string
    {
        return TimeUnit::class;
    }
}

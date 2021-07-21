<?php

namespace Pleets\Units\Units;

use Pleets\Units\Symbols\TimeSymbol;

class TimeUnit extends BaseUnit
{
    public const SECOND = 'second';
    public const MINUTE = 'minute';
    public const HOUR   = 'hour';
    public const DAY    = 'day';
    public const WEEK   = 'week';
    public const MONTH  = 'month';
    public const YEAR   = 'year';

    final protected static function symbol(): string
    {
        return TimeSymbol::class;
    }
}

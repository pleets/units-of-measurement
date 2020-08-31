<?php

namespace Pleets\Units\Symbols;

use MyCLabs\Enum\Enum;
use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use Pleets\Units\Units\TimeUnit;
use UnexpectedValueException;

class TimeSymbol extends Enum
{
    public const SECOND = 's';
    public const MINUTE = 'min';
    public const HOUR   = 'h';
    public const DAY    = 'd';
    public const WEEK   = 'w';
    public const MONTH  = 'm';
    public const YEAR   = 'y';

    public static function fromUnit(string $unit)
    {
        try {
            $unit = new TimeUnit($unit);
        } catch (UnexpectedValueException $e) {
            throw new TimeUnitOutOfRangeException('The time unit ' . $unit . ' does not exists');
        }

        $key = $unit->getKey();

        if (! self::isValidKey($key)) {
            throw new TimeUnitOutOfRangeException('The time unit ' . $unit . ' is not defined in ' . __CLASS__);
        }

        return self::toArray()[$key];
    }
}

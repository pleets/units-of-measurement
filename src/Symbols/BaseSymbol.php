<?php

namespace Pleets\Units\Symbols;

use MyCLabs\Enum\Enum;
use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use Pleets\Units\Units\TimeUnit;
use UnexpectedValueException;

abstract class BaseSymbol extends Enum
{
    abstract protected static function unit(): string;

    public static function fromUnit(string $unit)
    {
        try {
            $unitClass = static::unit();
            $unit      = new $unitClass($unit);
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

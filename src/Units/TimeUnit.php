<?php

namespace Pleets\Units\Units;

use MyCLabs\Enum\Enum;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use UnexpectedValueException;

class TimeUnit extends Enum
{
    public const SECOND = 'second';
    public const MINUTE = 'minute';
    public const HOUR = 'hour';
    public const DAY = 'day';
    public const WEEK = 'week';
    public const MONTH = 'month';
    public const YEAR = 'year';

    public static function fromSymbol(string $symbol)
    {
        try {
            $symbol = new TimeSymbol($symbol);
        } catch (UnexpectedValueException $e) {
            throw new SymbolOutOfRangeException('The symbol ' . $symbol . ' does not exists');
        }

        $key = $symbol->getKey();

        if (!self::isValidKey($key)) {
            throw new SymbolOutOfRangeException('The symbol ' . $symbol . ' is not defined in ' . __CLASS__);
        }

        return self::toArray()[$key];
    }
}

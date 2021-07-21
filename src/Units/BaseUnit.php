<?php

namespace Pleets\Units\Units;

use MyCLabs\Enum\Enum;
use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use UnexpectedValueException;

abstract class BaseUnit extends Enum
{
    abstract protected static function symbol(): string;

    public static function fromSymbol(string $symbol)
    {
        try {
            $symbolClass = static::symbol();
            $symbol      = new $symbolClass($symbol);
        } catch (UnexpectedValueException $e) {
            throw new SymbolOutOfRangeException('The symbol ' . $symbol . ' does not exists');
        }

        $key = $symbol->getKey();

        if (! self::isValidKey($key)) {
            throw new SymbolOutOfRangeException('The symbol ' . $symbol . ' is not defined in ' . __CLASS__);
        }

        return self::toArray()[$key];
    }
}

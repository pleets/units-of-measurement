<?php

namespace Pleets\Units;

use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use Pleets\Units\Units\TimeUnit;

class Time
{
    public const UNIT_MODE   = 'unit';
    public const SYMBOL_MODE = 'symbol';

    protected $unit;
    protected $symbol;
    protected $quantity;

    public function __construct(string $identifier, $quantity, $mode = self::UNIT_MODE)
    {
        if ($mode == self::UNIT_MODE) {
            $this->setFromUnit($identifier);
        }

        if ($mode == self::SYMBOL_MODE) {
            $this->setFromSymbol($identifier);
        }

        $this->quantity = $quantity;
    }

    private function setFromSymbol(string $symbol)
    {
        $this->symbol = $symbol;
        $this->unit   = TimeUnit::fromSymbol($symbol);
    }

    private function setFromUnit(string $unit)
    {
        $this->unit   = $unit;
        $this->symbol = TimeSymbol::fromUnit($unit);
    }

    public static function fromSymbol(string $symbol, $quantity): self
    {
        return new self($symbol, $quantity, self::SYMBOL_MODE);
    }

    public static function fromUnit(string $unit, $quantity): self
    {
        return new self($unit, $quantity, self::UNIT_MODE);
    }

    public function toString(): string
    {
        return $this->unit . " ({$this->symbol})";
    }
}

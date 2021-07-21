<?php

namespace Pleets\Units;

abstract class BaseUnitOfMeasurement
{
    protected const UNIT_MODE   = 'unit';
    protected const SYMBOL_MODE = 'symbol';

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

    abstract protected function symbol(): string;

    abstract protected function unit(): string;

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    protected function setFromSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
        $unitClass    = $this->unit();
        $this->unit   = $unitClass::fromSymbol($symbol);
    }

    protected function setFromUnit(string $unit): void
    {
        $this->unit   = $unit;
        $symbolClass  = $this->symbol();
        $this->symbol = $symbolClass::fromUnit($unit);
    }

    public static function fromSymbol(string $symbol, $quantity): self
    {
        return new static($symbol, $quantity, self::SYMBOL_MODE);
    }

    public static function fromUnit(string $unit, $quantity): self
    {
        return new static($unit, $quantity, self::UNIT_MODE);
    }

    protected function convertTo(string $unit): void
    {
        if ($this->unit === $unit) {
            return;
        }

        $conversion     = static::CONVERSIONS[$this->unit];
        $this->quantity = $this->quantity * $conversion / static::CONVERSIONS[$unit];
        $this->setFromUnit($unit);
    }

    public function toString($symbol = true): string
    {
        if ($symbol) {
            $unit = $this->symbol;
        } else {
            $unit = $this->quantity !== 1 ? ' ' . $this->unit . 's' : ' ' . $this->unit;
        }

        return $this->quantity . $unit;
    }

    public function toFixedString($precision = 2, $symbol = true): string
    {
        if ($symbol) {
            $unit = $this->symbol;
        } else {
            $unit = $this->quantity !== 1 ? ' ' . $this->unit . 's' : ' ' . $this->unit;
        }

        return round($this->quantity, $precision) . $unit;
    }
}

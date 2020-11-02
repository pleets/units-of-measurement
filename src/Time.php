<?php

namespace Pleets\Units;

use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

class Time
{
    public const UNIT_MODE   = 'unit';
    public const SYMBOL_MODE = 'symbol';

    private const CONVERSIONS = [
        TimeUnit::SECOND => 1,
        TimeUnit::MINUTE => 60,
        TimeUnit::HOUR   => 60 * 60,
        TimeUnit::DAY    => 60 * 60 * 24,
        TimeUnit::WEEK   => 60 * 60 * 24 * 7,
        TimeUnit::MONTH  => 60 * 60 * 24 * 30,
        TimeUnit::YEAR   => 60 * 60 * 24 * 30 * 12,
    ];

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

    public function toSeconds(): self
    {
        if ($this->unit === TimeUnit::SECOND) {
            return $this;
        }

        $this->quantity = $this->quantity * self::CONVERSIONS[$this->unit];
        $this->setFromUnit(TimeUnit::SECOND);
        
        return $this;
    }

    public function toMinutes(): self
    {
        $this->convertTo(TimeUnit::MINUTE);

        return $this;
    }

    public function toHours(): self
    {
        $this->convertTo(TimeUnit::HOUR);

        return $this;
    }

    public function toDays(): self
    {
        $this->convertTo(TimeUnit::DAY);

        return $this;
    }

    public function toWeeks(): self
    {
        $this->convertTo(TimeUnit::WEEK);

        return $this;
    }

    public function toMonths(): self
    {
        $this->convertTo(TimeUnit::MONTH);

        return $this;
    }

    public function toYears(): self
    {
        $this->convertTo(TimeUnit::YEAR);

        return $this;
    }

    private function convertTo(string $unit): void
    {
        if ($this->unit === $unit) {
            return;
        }
    
        $seconds        = self::CONVERSIONS[$this->unit];
        $this->quantity = $this->quantity * $seconds / self::CONVERSIONS[$unit];
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

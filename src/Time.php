<?php

namespace Pleets\Units;

use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

class Time extends BaseUnitOfMeasurement
{
    protected const CONVERSIONS = [
        TimeUnit::SECOND => 1,
        TimeUnit::MINUTE => 60,
        TimeUnit::HOUR   => 60 * 60,
        TimeUnit::DAY    => 60 * 60 * 24,
        TimeUnit::WEEK   => 60 * 60 * 24 * 7,
        TimeUnit::MONTH  => 60 * 60 * 24 * 30,
        TimeUnit::YEAR   => 60 * 60 * 24 * 30 * 12,
    ];

    protected function symbol(): string
    {
        return TimeSymbol::class;
    }

    protected function unit(): string
    {
        return TimeUnit::class;
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
}

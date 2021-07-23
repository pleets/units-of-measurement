<?php

namespace Pleets\Units;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Units\InformationUnit;

class Information extends BaseUnitOfMeasurement
{
    protected const CONVERSIONS = [
        InformationUnit::BYTE => 1,
        InformationUnit::KILOBYTE => 1000,
        InformationUnit::MEGABYTE => 1000 * 1000,
        InformationUnit::GIGABYTE => 1000 * 1000 * 1000,
        InformationUnit::TERABYTE => 1000 * 1000 * 1000 * 1000,
        InformationUnit::PETABYTE => 1000 * 1000 * 1000 * 1000 * 1000,
        InformationUnit::EXABYTE => 1000 * 1000 * 1000 * 1000 * 1000 * 1000,
        InformationUnit::ZETTABYTE => 1000 * 1000 * 1000 * 1000 * 1000 * 1000 * 1000,
        InformationUnit::YOTTABYTE => 1000 * 1000 * 1000 * 1000 * 1000 * 1000 * 1000 * 1000,
    ];

    protected function symbol(): string
    {
        return InformationSymbol::class;
    }

    protected function unit(): string
    {
        return InformationUnit::class;
    }

    public function toBytes(): self
    {
        if ($this->unit === InformationUnit::BYTE) {
            return $this;
        }

        $this->quantity = $this->quantity * self::CONVERSIONS[$this->unit];
        $this->setFromUnit(InformationUnit::BYTE);

        return $this;
    }

    public function toKilobytes(): self
    {
        $this->convertTo(InformationUnit::KILOBYTE);

        return $this;
    }

    public function toMegabytes(): self
    {
        $this->convertTo(InformationUnit::MEGABYTE);

        return $this;
    }

    public function toGigabytes(): self
    {
        $this->convertTo(InformationUnit::GIGABYTE);

        return $this;
    }

    public function toTerabytes(): self
    {
        $this->convertTo(InformationUnit::TERABYTE);

        return $this;
    }

    public function toPetabytes(): self
    {
        $this->convertTo(InformationUnit::PETABYTE);

        return $this;
    }

    public function toExabytes(): self
    {
        $this->convertTo(InformationUnit::EXABYTE);

        return $this;
    }

    public function toZettabytes(): self
    {
        $this->convertTo(InformationUnit::ZETTABYTE);

        return $this;
    }

    public function toYottabytes(): self
    {
        $this->convertTo(InformationUnit::YOTTABYTE);

        return $this;
    }
}

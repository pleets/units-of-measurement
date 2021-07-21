<?php

namespace Pleets\Units\Units\Sets;

use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use UnexpectedValueException;

abstract class BaseUnitSet
{
    protected array $units = [];

    abstract protected function symbol(): string;

    abstract protected function unit(): string;

    public function addUnit(string $unit): void
    {
        try {
            $unitClass = $this->unit();
            new $unitClass($unit);
        } catch (UnexpectedValueException $e) {
            throw new TimeUnitOutOfRangeException('The time unit ' . $unit . ' does not exists');
        }

        $this->units[] = $unit;
    }

    public function toArray(): array
    {
        return $this->units;
    }

    public function toArrayWithSymbols(): array
    {
        $timeSet     = [];
        $symbolClass = $this->symbol();

        foreach ($this->units as $unit) {
            $timeSet[$unit] = $symbolClass::fromUnit($unit);
        }

        return $timeSet;
    }
}

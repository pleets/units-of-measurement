<?php

namespace Pleets\Units\Units;

use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use Pleets\Units\Symbols\TimeSymbol;
use UnexpectedValueException;

class TimeUnitSet
{
    protected array $units = [];

    /**
     * @param string $unit
     * @throws TimeUnitOutOfRangeException
     */
    public function addUnit(string $unit): void
    {
        try {
            new TimeUnit($unit);
        } catch (UnexpectedValueException $e) {
            throw new TimeUnitOutOfRangeException('The time unit ' . $unit . ' does not exists');
        }

        $this->units[] = $unit;
    }

    public function toArray(): array
    {
        return $this->units;
    }

    public function toArrayWithSymbols()
    {
        $timeSet = [];

        foreach ($this->units as $unit) {
            $timeSet[$unit] = TimeSymbol::fromUnit($unit);
        }

        return $timeSet;
    }
}

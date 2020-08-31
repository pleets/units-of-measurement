<?php

namespace Pleets\Units\Symbols;

use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use Pleets\Units\Units\TimeUnit;
use UnexpectedValueException;

class TimeSymbolSet
{
    protected array $symbols = [];

    public function addSymbol(string $symbol): void
    {
        try {
            new TimeSymbol($symbol);
        } catch (UnexpectedValueException $e) {
            throw new SymbolOutOfRangeException('The time unit ' . $symbol . ' does not exists');
        }

        $this->symbols[] = $symbol;
    }

    public function toArray(): array
    {
        return $this->symbols;
    }

    public function toArrayWithUnits()
    {
        $timeSet = [];

        foreach ($this->symbols as $symbol) {
            $timeSet[$symbol] = TimeUnit::fromSymbol($symbol);
        }

        return $timeSet;
    }
}

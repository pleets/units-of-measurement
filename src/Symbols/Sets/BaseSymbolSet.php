<?php

namespace Pleets\Units\Symbols\Sets;

use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use UnexpectedValueException;

abstract class BaseSymbolSet
{
    protected array $symbols = [];

    abstract protected function symbol(): string;

    abstract protected function unit(): string;

    public function addSymbol(string $symbol): void
    {
        try {
            $symbolClass = $this->symbol();
            new $symbolClass($symbol);
        } catch (UnexpectedValueException $e) {
            throw new SymbolOutOfRangeException('The time unit ' . $symbol . ' does not exists');
        }

        $this->symbols[] = $symbol;
    }

    public function toArray(): array
    {
        return $this->symbols;
    }

    public function toArrayWithUnits(): array
    {
        $timeSet   = [];
        $unitClass = $this->unit();

        foreach ($this->symbols as $symbol) {
            $timeSet[$symbol] = $unitClass::fromSymbol($symbol);
        }

        return $timeSet;
    }
}

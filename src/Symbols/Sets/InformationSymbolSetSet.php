<?php

namespace Pleets\Units\Symbols\Sets;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Units\InformationUnit;

class InformationSymbolSetSet extends BaseSymbolSet
{
    protected function symbol(): string
    {
        return InformationSymbol::class;
    }

    protected function unit(): string
    {
        return InformationUnit::class;
    }
}

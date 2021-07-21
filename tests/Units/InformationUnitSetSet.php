<?php

namespace Tests\Units;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Units\InformationUnit;
use Pleets\Units\Units\Sets\BaseUnitSet;

class InformationUnitSetSet extends BaseUnitSet
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

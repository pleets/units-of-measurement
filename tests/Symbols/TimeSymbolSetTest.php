<?php

namespace Tests\Symbols;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Symbols\TimeSymbolSet;

class TimeSymbolSetTest extends TestCase
{
    /**
     * @test
     */
    public function itCanCreateASetOfTimeUnits()
    {
        $timeSet = new TimeSymbolSet();
        $timeSet->addSymbol(TimeSymbol::MINUTE);
        $timeSet->addSymbol(TimeSymbol::HOUR);
        $timeSet->addSymbol(TimeSymbol::MONTH);
        $timeSet->addSymbol(TimeSymbol::YEAR);

        $this->assertSame(['min', 'h', 'm', 'y'], $timeSet->toArray());
    }

    /**
     * @test
     */
    public function itCanCreateASetOfTimeUnitsWithSymbols()
    {
        $timeSet = new TimeSymbolSet();
        $timeSet->addSymbol(TimeSymbol::DAY);
        $timeSet->addSymbol(TimeSymbol::WEEK);

        $this->assertSame(['d' => 'day', 'w' => 'week'], $timeSet->toArrayWithUnits());
    }
}

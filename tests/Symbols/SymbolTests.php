<?php

namespace Tests\Symbols;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use Tests\Concerns\HasUnitsAndSymbols;
use Tests\Concerns\HasRandomValues;
use Tests\Constants\UnitRelation;

class SymbolTests extends TestCase
{
    use HasUnitsAndSymbols;
    use HasRandomValues;

    /**
     * @test
     * @dataProvider unitsAndSymbolsProvider
     */
    public function itCanGetTheSymbolOfAUnit(string $unit, string $symbol)
    {
        $und = $this->random($unit);

        $symbolName = $symbol::fromUnit($und);

        $this->assertSame(UnitRelation::SYMBOLS[$unit][$und], $symbolName);
    }

    /**
     * @test
     * @dataProvider unitsAndSymbolsProvider
     */
    public function itThrowsAnExceptionWhenTheUnitIfOutOfRange(string $unit, string $symbol)
    {
        $this->expectException(TimeUnitOutOfRangeException::class);

        $symbol::fromUnit(uniqid());
    }
}

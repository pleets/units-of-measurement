<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use Tests\Concerns\HasUnitsAndSymbols;
use Tests\Concerns\HasRandomValues;
use Tests\Constants\UnitRelation;

class UnitTests extends TestCase
{
    use HasUnitsAndSymbols;
    use HasRandomValues;

    /**
     * @test
     * @dataProvider unitsAndSymbolsProvider
     */
    public function itCanGetTheUnitFromASymbol(string $unit, string $symbol)
    {
        $sym = $this->random($symbol);

        $unitName = $unit::fromSymbol($sym);

        $this->assertSame(UnitRelation::UNITS[$symbol][$sym], $unitName);
    }

    /**
     * @test
     * @dataProvider unitsAndSymbolsProvider
     */
    public function itThrowsAnExceptionWhenTheUnitIfOutOfRange(string $unit)
    {
        $this->expectException(SymbolOutOfRangeException::class);

        $unit::fromSymbol(uniqid());
    }
}

<?php

namespace Tests\Symbols;

use PHPUnit\Framework\TestCase;
use Tests\Concerns\HasRandomValues;
use Tests\Concerns\HasSymbolSets;
use Tests\Concerns\HasUnitsAndSymbols;
use Tests\Constants\UnitRelation;

class SymbolSetsTest extends TestCase
{
    use HasUnitsAndSymbols;
    use HasSymbolSets;
    use HasRandomValues;

    /**
     * @test
     * @dataProvider symbolSetsProvider
     */
    public function itCanCreateASetOfSymbols(string $symbol, string $symbolSet)
    {
        $set = new $symbolSet();

        $symbolsToAdd = [
            $this->random($symbol),
            $this->random($symbol),
            $this->random($symbol)
        ];

        foreach ($symbolsToAdd as $symbolToAdd) {
            $set->addSymbol($symbolToAdd);
        }

        $this->assertSame(array_values($symbolsToAdd), $set->toArray());
    }

    /**
     * @test
     * @dataProvider symbolSetsProvider
     */
    public function itCanCreateASetOfTimeUnitsWithSymbols(string $symbol, string $symbolSet)
    {
        $set = new $symbolSet();

        $symbolsToAdd = [
            $this->random($symbol),
            $this->random($symbol),
            $this->random($symbol)
        ];

        foreach ($symbolsToAdd as $symbolToAdd) {
            $set->addSymbol($symbolToAdd);
        }

        $symbolsWithUnits = [];

        foreach ($symbolsToAdd as $symbolToAdd) {
            $unit                           = UnitRelation::UNITS[$symbol][$symbolToAdd];
            $symbolsWithUnits[$symbolToAdd] = $unit;
        }

        $this->assertSame($symbolsWithUnits, $set->toArrayWithUnits());
    }
}

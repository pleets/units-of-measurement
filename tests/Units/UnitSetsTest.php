<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Tests\Concerns\HasUnitsAndSymbols;
use Tests\Concerns\HasRandomValues;
use Tests\Concerns\HasUnitSets;
use Tests\Constants\UnitRelation;

class UnitSetsTest extends TestCase
{
    use HasUnitsAndSymbols;
    use HasUnitSets;
    use HasRandomValues;

    /**
     * @test
     * @dataProvider unitSetsProvider
     */
    public function itCanCreateASetOfUnits(string $unit, string $unitSet)
    {
        $set = new $unitSet();

        $unitsToAdd = [
            $this->random($unit),
            $this->random($unit),
            $this->random($unit)
        ];

        foreach ($unitsToAdd as $unitToAdd) {
            $set->addUnit($unitToAdd);
        }

        $this->assertSame(array_values($unitsToAdd), $set->toArray());
    }

    /**
     * @test
     * @dataProvider unitSetsProvider
     */
    public function itCanCreateASetOfTimeUnitsWithSymbols(string $unit, string $unitSet)
    {
        $set = new $unitSet();

        $unitsToAdd = [
            $this->random($unit),
            $this->random($unit),
            $this->random($unit)
        ];

        foreach ($unitsToAdd as $unitToAdd) {
            $set->addUnit($unitToAdd);
        }

        $unitsWithSymbols = [];

        foreach ($unitsToAdd as $unitToAdd) {
            $symbol                       = UnitRelation::SYMBOLS[$unit][$unitToAdd];
            $unitsWithSymbols[$unitToAdd] = $symbol;
        }

        $this->assertSame($unitsWithSymbols, $set->toArrayWithSymbols());
    }
}

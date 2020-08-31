<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Units\TimeUnitSet;
use Pleets\Units\Units\TimeUnit;

class TimeUnitSetTest extends TestCase
{
    /**
     * @test
     */
    public function itCanCreateASetOfTimeUnits()
    {
        $timeSet = new TimeUnitSet();
        $timeSet->addUnit(TimeUnit::MINUTE);
        $timeSet->addUnit(TimeUnit::HOUR);
        $timeSet->addUnit(TimeUnit::MONTH);
        $timeSet->addUnit(TimeUnit::YEAR);

        $this->assertSame(['minute', 'hour', 'month', 'year'], $timeSet->toArray());
    }

    /**
     * @test
     */
    public function itCanCreateASetOfTimeUnitsWithSymbols()
    {
        $timeSet = new TimeUnitSet();
        $timeSet->addUnit(TimeUnit::DAY);
        $timeSet->addUnit(TimeUnit::WEEK);

        $this->assertSame(['day' => 'd', 'week' => 'w'], $timeSet->toArrayWithSymbols());
    }
}
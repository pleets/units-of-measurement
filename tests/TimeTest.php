<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Time;
use Pleets\Units\Units\TimeUnit;
use Tests\Concerns\HasUnits;

class TimeTest extends TestCase
{
    use HasUnits;

    /**
     * @test
     */
    public function itReturnsTheStringRepresentationWithSymbol()
    {
        $time = Time::fromUnit('minute', 5);

        $this->assertSame('5min', $time->toString());
    }

    /**
     * @test
     */
    public function itReturnsTheStringRepresentationWithUnit()
    {
        $time = Time::fromUnit('minute', 5);

        $this->assertSame('5 minutes', $time->toString(false));
    }

    /**
     * @test
     */
    public function itReturnsTheUnitSymbolAndQuantity()
    {
        $time = Time::fromUnit('minute', 120);

        $this->assertSame('minute', $time->getUnit());
        $this->assertSame('min', $time->getSymbol());
        $this->assertSame(120, $time->getQuantity());
    }

    /**
     * @test
     * @dataProvider singleUnitToUnitsProvider
     */
    public function itChangesTheUnit(string $unit)
    {
        $time = Time::fromUnit('minute', 120);

        switch ($unit) {
            case TimeUnit::SECOND:
                $time->toSeconds();
                break;
            case TimeUnit::MINUTE:
                $time->toMinutes();
                break;
            case TimeUnit::HOUR:
                $time->toHours();
                break;
            case TimeUnit::DAY:
                $time->toDays();
                break;
            case TimeUnit::WEEK:
                $time->toWeeks();
                break;
            case TimeUnit::MONTH:
                $time->toMonths();
                break;
            case TimeUnit::YEAR:
                $time->toYears();
                break;
        }

        switch ($unit) {
            case TimeUnit::SECOND:
                $this->assertSame('7200 seconds', $time->toString(false));
                $this->assertSame('second', $time->getUnit());
                $this->assertSame('s', $time->getSymbol());
                $this->assertSame(7200, $time->getQuantity());
                break;
            case TimeUnit::MINUTE:
                $this->assertSame('120 minutes', $time->toString(false));
                $this->assertSame('minute', $time->getUnit());
                $this->assertSame('min', $time->getSymbol());
                $this->assertSame(120, $time->getQuantity());
                break;
            case TimeUnit::HOUR:
                $this->assertSame('2 hours', $time->toString(false));
                $this->assertSame('hour', $time->getUnit());
                $this->assertSame('h', $time->getSymbol());
                $this->assertSame(2, $time->getQuantity());
                break;
            case TimeUnit::DAY:
                $this->assertSame('0.08 days', $time->toFixedString(2, false));
                $this->assertSame('day', $time->getUnit());
                $this->assertSame('d', $time->getSymbol());
                $this->assertSame(0.08, round($time->getQuantity(), 2));
                break;
            case TimeUnit::WEEK:
                $this->assertSame('0.01 weeks', $time->toFixedString(2, false));
                $this->assertSame('week', $time->getUnit());
                $this->assertSame('w', $time->getSymbol());
                $this->assertSame(0.01, round($time->getQuantity(), 2));
                break;
            case TimeUnit::MONTH:
                $this->assertSame('0.003 months', $time->toFixedString(3, false));
                $this->assertSame('month', $time->getUnit());
                $this->assertSame('m', $time->getSymbol());
                $this->assertSame(0.003, round($time->getQuantity(), 3));
                break;
            case TimeUnit::YEAR:
                $this->assertSame('0.0002 years', $time->toFixedString(4, false));
                $this->assertSame('year', $time->getUnit());
                $this->assertSame('y', $time->getSymbol());
                $this->assertSame(0.0002, round($time->getQuantity(), 4));
                break;
        }
    }
}

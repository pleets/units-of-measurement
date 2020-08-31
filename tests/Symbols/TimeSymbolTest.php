<?php

namespace Tests\Symbols;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Symbols\Exceptions\TimeUnitOutOfRangeException;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

class TimeSymbolTest extends TestCase
{
    /**
     * @test
     */
    public function itCanGetTheSymbolOfAUnit()
    {
        $symbol = TimeSymbol::fromUnit(TimeUnit::SECOND);

        $this->assertSame('s', $symbol);
    }

    /**
     * @test
     */
    public function itThrowsAnExceptionWhenTheUnitIfOutOfRange()
    {
        $this->expectException(TimeUnitOutOfRangeException::class);

        TimeSymbol::fromUnit(uniqid());
    }
}
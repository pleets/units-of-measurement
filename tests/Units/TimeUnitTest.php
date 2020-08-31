<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\Exceptions\SymbolOutOfRangeException;
use Pleets\Units\Units\TimeUnit;

class TimeUnitTest extends TestCase
{
    /**
     * @test
     */
    public function itCanGetTheSymbolOfAUnit()
    {
        $symbol = TimeUnit::fromSymbol(TimeSymbol::SECOND);

        $this->assertSame('second', $symbol);
    }

    /**
     * @test
     */
    public function itThrowsAnExceptionWhenTheUnitIfOutOfRange()
    {
        $this->expectException(SymbolOutOfRangeException::class);

        TimeUnit::fromSymbol(uniqid());
    }
}
<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Time;

class TimeTest extends TestCase
{
    /**
     * @test
     */
    public function itReturnTheStringRepresentation()
    {
        $time = Time::fromUnit('minute', 5);
        $this->assertSame('minute (min)', $time->toString());
    }
}

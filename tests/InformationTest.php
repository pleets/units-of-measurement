<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pleets\Units\Units\Information;
use Pleets\Units\Units\InformationUnit;
use Tests\Concerns\HasUnits;

class InformationTest extends TestCase
{
    use HasUnits;

    /**
     * @test
     */
    public function itReturnsTheStringRepresentationWithSymbol()
    {
        $time = Information::fromUnit('kilobyte', 5);

        $this->assertSame('5KB', $time->toString());
    }

    /**
     * @test
     */
    public function itReturnsTheStringRepresentationWithUnit()
    {
        $time = Information::fromUnit('kilobyte', 5);

        $this->assertSame('5 kilobytes', $time->toString(false));
    }

    /**
     * @test
     */
    public function itReturnsTheUnitTheSymbolAndQuantity()
    {
        $time = Information::fromUnit('kilobyte', 120);

        $this->assertSame('kilobyte', $time->getUnit());
        $this->assertSame('KB', $time->getSymbol());
        $this->assertSame(120, $time->getQuantity());
    }

    /**
     * @test
     * @dataProvider singleInformationUnitsProvider
     */
    public function itChangesTheUnit(string $unit)
    {
        $information = Information::fromUnit('megabyte', 120);

        switch ($unit) {
            case InformationUnit::BYTE:
                $information->toBytes();
                break;
            case InformationUnit::KILOBYTE:
                $information->toKilobytes();
                break;
            case InformationUnit::MEGABYTE:
                $information->toMegabytes();
                break;
            case InformationUnit::GIGABYTE:
                $information->toGigabytes();
                break;
            case InformationUnit::TERABYTE:
                $information->toTerabytes();
                break;
            case InformationUnit::PETABYTE:
                $information->toPetabytes();
                break;
            case InformationUnit::EXABYTE:
                $information->toExabytes();
                break;
            case InformationUnit::ZETTABYTE:
                $information->toZettabytes();
                break;
            case InformationUnit::YOTTABYTE:
                $information->toYottaBytes();
                break;
        }

        switch ($unit) {
            case InformationUnit::BYTE:
                $this->assertSame('120000000 bytes', $information->toString(false));
                $this->assertSame('byte', $information->getUnit());
                $this->assertSame('B', $information->getSymbol());
                $this->assertSame(120000000, $information->getQuantity());
                break;
            case InformationUnit::KILOBYTE:
                $this->assertSame('120000 kilobytes', $information->toString(false));
                $this->assertSame('kilobyte', $information->getUnit());
                $this->assertSame('KB', $information->getSymbol());
                $this->assertSame(120000, $information->getQuantity());
                break;
            case InformationUnit::MEGABYTE:
                $this->assertSame('120 megabytes', $information->toString(false));
                $this->assertSame('megabyte', $information->getUnit());
                $this->assertSame('MB', $information->getSymbol());
                $this->assertSame(120, $information->getQuantity());
                break;
            case InformationUnit::GIGABYTE:
                $this->assertSame('0.12 gigabytes', $information->toString(false));
                $this->assertSame('gigabyte', $information->getUnit());
                $this->assertSame('GB', $information->getSymbol());
                $this->assertSame(0.12, $information->getQuantity());
                break;
            case InformationUnit::TERABYTE:
                $this->assertSame('0.00012 terabytes', $information->toString(false));
                $this->assertSame('terabyte', $information->getUnit());
                $this->assertSame('TB', $information->getSymbol());
                $this->assertSame(0.00012, $information->getQuantity());
                break;
            case InformationUnit::PETABYTE:
                $this->assertSame('1.2E-7 petabytes', $information->toString(false));
                $this->assertSame('petabyte', $information->getUnit());
                $this->assertSame('PB', $information->getSymbol());
                $this->assertSame(0.00000012, $information->getQuantity());
                break;
            case InformationUnit::EXABYTE:
                $this->assertSame('1.2E-10 exabytes', $information->toString(false));
                $this->assertSame('exabyte', $information->getUnit());
                $this->assertSame('EB', $information->getSymbol());
                $this->assertSame(0.00000000012, $information->getQuantity());
                break;
            case InformationUnit::ZETTABYTE:
                $this->assertSame('1.2E-13 zettabytes', $information->toString(false));
                $this->assertSame('zettabyte', $information->getUnit());
                $this->assertSame('ZB', $information->getSymbol());
                $this->assertSame(0.00000000000012, $information->getQuantity());
                break;
            case InformationUnit::YOTTABYTE:
                $this->assertSame('1.2E-16 yottabytes', $information->toString(false));
                $this->assertSame('yottabyte', $information->getUnit());
                $this->assertSame('YB', $information->getSymbol());
                $this->assertSame(0.00000000000000012, $information->getQuantity());
                break;
        }
    }
}

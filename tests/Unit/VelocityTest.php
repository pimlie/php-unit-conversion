<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Velocity;
use PhpUnitConversion\Unit\Volume;

class VelocityTest extends TestCase
{
    public function testFromFootPerHour()
    {
        $volumeUnit = new Velocity\FootPerHour(100000);
        $this->assertEquals('8.467 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(3));
    }

    public function testFromFootPerMinute()
    {
        $volumeUnit = new Velocity\FootPerMinute(100000);
        $this->assertEquals('508.001 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(3));
    }

    public function testFromFootPerSecond()
    {
        $volumeUnit = new Velocity\FootPerSecond(100000);
        $this->assertEquals('30480 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(0));
    }

    public function testFromMilesPerHour()
    {
        $volumeUnit = new Velocity\MilePerHour(100000);
        $this->assertEquals('44704 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(0));
    }

    public function testFromKiloMetersPerHour()
    {
        $volumeUnit = new Velocity\KiloMeterPerHour(100000);
        $this->assertEquals('27777.78 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(2));
    }

    public function testFromMilesPerSecond()
    {
        $volumeUnit = new Velocity\MilePerSecond(100000);
        $this->assertEquals('160934400.00 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(2));
    }

    public function testFromInchPerHour()
    {
        $volumeUnit = new Velocity\InchPerHour(100000);
        $this->assertEquals('0.706 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(3));
    }

    public function testFromInchPerMinute()
    {
        $volumeUnit = new Velocity\InchPerMinute(100000);
        $this->assertEquals('42.333 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(3));
    }

    public function testFromInchPerSecond()
    {
        $volumeUnit = new Velocity\InchPerSecond(100000);
        $this->assertEquals('2540.00 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(2));
    }

    public function testFromKnot()
    {
        $volumeUnit = new Velocity\Knot(100000);
        $this->assertEquals('51444 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(0));
    }

    public function testFromMilesPerMinute()
    {
        $volumeUnit = new Velocity\MilePerMinute(100000);
        $this->assertEquals('2682240.00 m/s', Velocity\MeterPerSecond::from($volumeUnit)->format(2));
    }
}

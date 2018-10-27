<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Time;

class TimeTest extends TestCase
{
    public function testToMinute()
    {
        $timeUnit = new Time\Second(30);
        $this->assertEquals('0.5 m', Time\Minute::from($timeUnit)->format(1));
    }
}

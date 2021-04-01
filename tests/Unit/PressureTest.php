<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Pressure;

class PressureTest extends TestCase
{
    public function testFromBar()
    {
        $pressUnit = new Pressure\Bar(1);
        $this->assertEquals('100000.00 Pa', Pressure\Pascal::from($pressUnit)->format(2));
    }

    public function testFromBarye()
    {
        $pressUnit = new Pressure\Barye(10);
        $this->assertEquals('1.00 Pa', Pressure\Pascal::from($pressUnit)->format(2));
    }

    public function testFromMilliMetreOfMercury()
    {
        $pressUnit = new Pressure\MilliMetreOfMercury(1);
        $this->assertEquals('133.3224 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromCentiMetreOfMercury()
    {
        $pressUnit = new Pressure\CentiMetreOfMercury(1);
        $this->assertEquals('1333.2239 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromInchOfMercury()
    {
        $pressUnit = new Pressure\InchOfMercury(0.5);
        $this->assertEquals('1693.1943 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromFootOfMercury()
    {
        $pressUnit = new Pressure\FootOfMercury(2);
        $this->assertEquals('81273.3280 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromMilliMetreOfWater()
    {
        $pressUnit = new Pressure\MilliMetreOfWater(12);
        $this->assertEquals('117.6766 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromCentiMetreOfWater()
    {
        $pressUnit = new Pressure\CentiMetreOfWater(12);
        $this->assertEquals('1176.7656 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromInchOfWater()
    {
        $pressUnit = new Pressure\InchOfWater(0.01);
        $this->assertEquals('2.4909 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromFootOfWater()
    {
        $pressUnit = new Pressure\FootOfWater(5);
        $this->assertEquals('14945.3345 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromPoundPerSquareInch()
    {
        $pressUnit = new Pressure\PoundPerSquareInch(1);
        $this->assertEquals('6894.7573 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromPoundPerSquareFoot()
    {
        $pressUnit = new Pressure\PoundPerSquareFoot(4);
        $this->assertEquals('191.5210 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromPoundalPerSquareFoot()
    {
        $pressUnit = new Pressure\PoundalPerSquareFoot(7);
        $this->assertEquals('10.4171 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromKiloGramForcePerSquareMilliMetre()
    {
        $pressUnit = new Pressure\KiloGramForcePerSquareMilliMetre(0.5);
        $this->assertEquals('4903325 Pa', Pressure\Pascal::from($pressUnit)->format(0));
    }

    public function testFromKipPerSquareInch()
    {
        $pressUnit = new Pressure\KipPerSquareInch(0.95);
        $this->assertEquals('6550019.4160 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testFromStandardAtmosphere()
    {
        $pressUnit = new Pressure\StandardAtmosphere(1);
        $this->assertEquals('101325.00 Pa', Pressure\Pascal::from($pressUnit)->format(2));
    }

    public function testFromTechnicalAtmosphere()
    {
        $pressUnit = new Pressure\TechnicalAtmosphere(1);
        $this->assertEquals('98066 Pa', Pressure\Pascal::from($pressUnit)->format(0));
    }

    public function testFromPieze()
    {
        $pressUnit = new Pressure\Pieze(3.13);
        $this->assertEquals('3130 Pa', Pressure\Pascal::from($pressUnit)->format(0));
    }

    public function testFromTorr()
    {
        $pressUnit = new Pressure\Torr(1);
        $this->assertEquals('133.3224 Pa', Pressure\Pascal::from($pressUnit)->format(4));
    }

    public function testToMilliPascal()
    {
        $pressUnit = new Pressure\Pascal(21);

        $milliPascal = $pressUnit->to(Pressure\MilliPascal::class);

        $this->assertEquals('21000 mPa', $milliPascal->format(0));
    }

    public function testToKiloPascal()
    {
        $pressUnit = new Pressure\Pascal(21);
        $kiloPascal = new Pressure\KiloPascal;

        $pressUnit->to($kiloPascal);

        $this->assertEquals('0.021 kPa', $kiloPascal->format());
    }

    public function testToBar()
    {
        $pressUnit = new Pressure\Pascal(1E5);

        $bar = $pressUnit->to(new Pressure\Bar);

        $this->assertEquals('1.00 bar', $bar->format(2));
    }

    public function testToTimeWhichShouldFail()
    {
        $this->expectException(Exception::class);

        $pressUnit = new Pressure\Pascal(1);

        $ounce = $pressUnit->to(new Unit\Time\Second);
    }

    public function testFromString()
    {
        $pressUnit = Unit::from('5 kPa');

        $this->assertInstanceOf(Pressure\KiloPascal::class, $pressUnit);
    }

    public function testAddition()
    {
        $pressUnit = new Pressure\Pascal(321);

        $newUnit = $pressUnit->add(new Pressure\Bar(0.1), new Pressure\Pascal(123));

        $this->assertEquals('10444 Pa', $newUnit->format(0));
    }

    public function testSubstraction()
    {
        $pressUnit = new Pressure\Pascal(10444);

        $newUnit = $pressUnit->substract(
            new Pressure\MilliMetreOfMercury(1), new Pressure\Pascal(123)
        );

        $this->assertEquals('10187.6776 Pa', $newUnit->format(4));
    }
}

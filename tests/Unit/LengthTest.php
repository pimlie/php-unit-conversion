<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Length;

class LengthTest extends TestCase
{
    public function testFromThou()
    {
        $lengthUnit = new Length\Thou(1);
        $this->assertEquals('25.400 μm', Length\MicroMeter::from($lengthUnit)->format(3));
    }
    public function testFromInch()
    {
        $lengthUnit = new Length\Inch(1);
        $this->assertEquals('0.0254 m', Length\Meter::from($lengthUnit)->format(4));
    }
    public function testFromFoot()
    {
        $lengthUnit = new Length\Foot(1);
        $this->assertEquals('0.3048 m', Length\Meter::from($lengthUnit)->format(4));
    }
    public function testFromFootAnother()
    {
        $lengthUnit = new Length\Foot(136043.25);
        $lengthUnitTo = new Length\Meter();
        $this->assertEquals('41465.9826 m', $lengthUnit->to($lengthUnitTo)->format(4));
    }
    public function testFromYard()
    {
        $lengthUnit = new Length\Yard(1);
        $this->assertEquals('0.914 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromChain()
    {
        $lengthUnit = new Length\Chain(1);
        $this->assertEquals('20.117 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromFurlong()
    {
        $lengthUnit = new Length\Furlong(1);
        $this->assertEquals('201.168 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromMile()
    {
        $lengthUnit = new Length\Mile(1);
        $this->assertEquals('1609.344 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromLeague()
    {
        $lengthUnit = new Length\League(1);
        $this->assertEquals('4828.032 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromImperialFathom()
    {
        $lengthUnit = new Length\ImperialFathom(1);
        $this->assertEquals('1.853 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromImperialCable()
    {
        $lengthUnit = new Length\ImperialCable(1);
        $this->assertEquals('185.318 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromImperialNauticalMile()
    {
        $lengthUnit = new Length\ImperialNauticalMile(1);
        $this->assertEquals('1853.184 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromLink()
    {
        $lengthUnit = new Length\Link(1);
        $this->assertEquals('0.201 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromRod()
    {
        $lengthUnit = new Length\Rod(1);
        $this->assertEquals('5.029 m', Length\Meter::from($lengthUnit)->format(3));
    }

    public function testFromPoint()
    {
        $lengthUnit = new Length\Point(1);
        $this->assertEquals('352.778 μm', Length\MicroMeter::from($lengthUnit)->format(3));
    }
    public function testFromPica()
    {
        $lengthUnit = new Length\Pica(1);
        $this->assertEquals('4.233 mm', Length\MilliMeter::from($lengthUnit)->format(3));
    }

    public function testFromFathom()
    {
        $lengthUnit = new Length\Fathom(1);
        $this->assertEquals('1.829 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromCable()
    {
        $lengthUnit = new Length\Cable(1);
        $this->assertEquals('219.456 m', Length\Meter::from($lengthUnit)->format(3));
    }
    public function testFromNauticalMile()
    {
        $lengthUnit = new Length\NauticalMile(1);
        $this->assertEquals('1.852 km', Length\KiloMeter::from($lengthUnit)->format(3));
    }
}

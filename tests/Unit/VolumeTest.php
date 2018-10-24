<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Volume;

class VolumeTest extends TestCase
{
    public function testFromGallon()
    {
        $volumeUnit = new Volume\Gallon(1);
        $this->assertEquals('4.546 l', Volume\Liter::from($volumeUnit)->format(3));
    }
    
    public function testFromQuart()
    {
        $volumeUnit = new Volume\Quart(2);
        $this->assertEquals('0.002273 m3', $volumeUnit->to(Volume::BASE_UNIT)->format(6));
        $this->assertEquals('2273.045 ml', Volume\MilliLiter::from($volumeUnit->to(Volume::BASE_UNIT))->format(3));
        $this->assertEquals('2.273 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromPint()
    {
        $volumeUnit = new Volume\Pint(1);
        $this->assertEquals('568.261 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromGill()
    {
        $volumeUnit = new Volume\Gill(1);
        $this->assertEquals('142.065 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromFluidOunce()
    {
        $volumeUnit = new Volume\FluidOunce(1);
        $this->assertEquals('28.413 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromFluidDrachm()
    {
        $volumeUnit = new Volume\FluidDrachm(1);
        $this->assertEquals('3.552 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromFluidScruple()
    {
        $volumeUnit = new Volume\FluidScruple(1);
        $this->assertEquals('1.184 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromMinim()
    {
        $volumeUnit = new Volume\Minim(1);
        $this->assertEquals('59.194 μl', Volume\MicroLiter::from($volumeUnit)->format(3));
    }

    public function testFromCubicInch()
    {
        $volumeUnit = new Volume\CubicInch(1);
        $this->assertEquals('16.387 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromCubicFoot()
    {
        $volumeUnit = new Volume\CubicFoot(1);
        $this->assertEquals('28.317 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromCubicYard()
    {
        $volumeUnit = new Volume\CubicYard(1);
        $this->assertEquals('764.555 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromAcreFoot()
    {
        $volumeUnit = new Volume\AcreFoot(1);
        $this->assertEquals('1233.482 m3', Volume\CubicMeter::from($volumeUnit)->format(3));
        $this->assertEquals('1.233 Ml', Volume\MegaLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSMinim()
    {
        $volumeUnit = new Volume\USMinim(1);
        $this->assertEquals('61.612 μl', Volume\MicroLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSFluidDram()
    {
        $volumeUnit = new Volume\USFluidDram(1);
        $this->assertEquals('3.697 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromTeaspoon()
    {
        $volumeUnit = new Volume\Teaspoon(1);
        $this->assertEquals('4.929 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromTablespoon()
    {
        $volumeUnit = new Volume\Tablespoon(1);
        $this->assertEquals('14.787 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSFluidOunce()
    {
        $volumeUnit = new Volume\USFluidOunce(1);
        $this->assertEquals('29.574 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSShot()
    {
        $volumeUnit = new Volume\USShot(1);
        $this->assertEquals('44.360 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSGill()
    {
        $volumeUnit = new Volume\USGill(1);
        $this->assertEquals('118.294 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSCup()
    {
        $volumeUnit = new Volume\USCup(1);
        $this->assertEquals('236.588 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSLiquidPint()
    {
        $volumeUnit = new Volume\USLiquidPint(1);
        $this->assertEquals('473.176 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromUSLiquidQuart()
    {
        $volumeUnit = new Volume\USLiquidQuart(1);
        $this->assertEquals('0.946 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromUSLiquidGallon()
    {
        $volumeUnit = new Volume\USLiquidGallon(1);
        $this->assertEquals('3.785 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromUSLiquidBarrel()
    {
        $volumeUnit = new Volume\LiquidBarrel(1);
        $this->assertEquals('119.240 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromOilBarrel()
    {
        $volumeUnit = new Volume\OilBarrel(1);
        $this->assertEquals('158.987 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromHogshead()
    {
        $volumeUnit = new Volume\Hogshead(1);
        $this->assertEquals('238.481 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromDryPint()
    {
        $volumeUnit = new Volume\DryPint(1);
        $this->assertEquals('550.610 ml', Volume\MilliLiter::from($volumeUnit)->format(3));
    }

    public function testFromDryQuart()
    {
        $volumeUnit = new Volume\DryQuart(1);
        $this->assertEquals('1.101 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromDryGallon()
    {
        $volumeUnit = new Volume\DryGallon(1);
        $this->assertEquals('4.405 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromPeck()
    {
        $volumeUnit = new Volume\Peck(1);
        $this->assertEquals('8.810 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromBushel()
    {
        $volumeUnit = new Volume\Bushel(1);
        $this->assertEquals('35.239 l', Volume\Liter::from($volumeUnit)->format(3));
    }

    public function testFromDryBarrel()
    {
        $volumeUnit = new Volume\DryBarrel(1);
        $this->assertEquals('115.627 l', Volume\Liter::from($volumeUnit)->format(3));
    }
}

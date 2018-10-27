<?php
namespace PhpUnitConversionTest;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversionTest\Fixtures\MyUnitType;

class UnitTest extends TestCase
{
    public function testFactors()
    {
        $unit = new MyUnitType\OneUnit(1);
        $this->assertEquals(0.5, $unit->to(MyUnitType\DoubleUnit::class)->getValue());
        $this->assertEquals(2, $unit->to(MyUnitType\HalfUnit::class)->getValue());
        $this->assertEquals(3, $unit->to(MyUnitType\ThirdUnitRelativeFromBase::class)->getValue());
        $this->assertEquals(0.5, MyUnitType\DoubleUnitRelativeFromHalf::from($unit)->getValue());
        $this->assertEquals(0.5, MyUnitType\DoubleUnitRelativeFromThird::from($unit)->getValue());
        
        $unit = new MyUnitType\DoubleUnitRelativeFromHalf(1);
        $this->assertEquals(2, MyUnitType\OneUnit::from($unit)->getValue());
        $this->assertEquals(1, MyUnitType\DoubleUnitRelativeFromThird::from($unit)->getValue());
        
        $unit = new MyUnitType\ThirdUnitRelativeFromBase(1);
        $this->assertEquals(1/3, MyUnitType\OneUnit::from($unit)->getValue());
        $this->assertEquals(2/3, MyUnitType\HalfUnit::from($unit)->getValue());
        $this->assertEquals(1/6, MyUnitType\DoubleUnitRelativeFromHalf::from($unit)->getValue());
        
        $unit = new MyUnitType\DoubleUnitRelativeFromThird(2);
        $this->assertEquals(4, MyUnitType\OneUnit::from($unit)->getValue());
        $this->assertEquals(2, MyUnitType\DoubleUnit::from($unit)->getValue());
        $this->assertEquals(8, MyUnitType\HalfUnit::from($unit)->getValue());
        $this->assertEquals(2, MyUnitType\DoubleUnitRelativeFromHalf::from($unit)->getValue());
    }

    public function testAdditions()
    {
        $unit = new MyUnitType\OneUnit(1);
        $this->assertEquals(0, MyUnitType\AdditionUnit::from($unit)->getValue());

        $unit = new MyUnitType\AdditionUnit(1);
        $this->assertEquals(3, MyUnitType\OneUnit::from($unit)->getValue());

        $unit = new MyUnitType\OneUnit(1);
        $this->assertEquals(0.25, MyUnitType\RelativeAdditionUnit::from($unit)->getValue());

        $unit = new MyUnitType\RelativeAdditionUnit(1);
        $this->assertEquals(4, MyUnitType\OneUnit::from($unit)->getValue());
    }

    public function testTypeValues()
    {
        $kiloGrams = new Mass\KiloGram(1);
        
        $typeValue = $kiloGrams();
        
        $this->assertEquals(64001, $typeValue);
        
        $grams = Unit::from($typeValue);
        
        $this->assertInstanceOf(Mass\Gram::class, $grams);
        
        $this->assertEquals(1, $grams->to(Mass\KiloGram::class)->getValue());
    }
    
    public function testNearestUnit()
    {
        $grams = new Mass\Gram(850);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\Metric::class);
        
        $this->assertInstanceOf(Mass\HectoGram::class, $unit);
    }

    public function testNearestUnit90()
    {
        $grams = new Mass\Gram(900);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\Metric::class);

        $this->assertInstanceOf(Mass\KiloGram::class, $unit);
    }

    public function testNearestUnitOtherSystem()
    {
        $grams = new Mass\Gram(850);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\USC::class);
        
        $this->assertInstanceOf(Mass\Pound::class, $unit);
        $this->assertEquals('1.874 lb', $unit->format());
    }

    public function testNearestInteger()
    {
        $unit = Mass::nearest(1);

        $this->assertInstanceOf(Mass\Gram::class, $unit);
    }

    public function testNearestUnsupported()
    {
        $this->expectException(\InvalidArgumentException::class);

        $unit = Mass::nearest("1");
    }

    public function testInvalidInvocation()
    {
        $this->expectException(Exception::class);
        
        Unit::nearest(new Mass\Gram(1));
    }

    public function testLabel()
    {
        $unit = new MyUnitType\OneUnit(1);
        
        $this->assertEquals('unit', $unit->getLabel());
    }

    public function testToString()
    {
        $unit = new MyUnitType\OneUnit(1);
        
        $this->assertEquals('1 u', (string)$unit);
    }

    public function testFromString()
    {
        $unit = Mass::from('1 g');
        $this->assertInstanceOf(Mass\Gram::class, $unit);

        $unit = Mass::from('1 gram');
        $this->assertInstanceOf(Mass\Gram::class, $unit);
    }

    public function testUnsupportedFrom()
    {
        $this->expectException(Exception::class);

        $unit = new Unit\Length\Meter(1);
        $unit->from(Mass\Gram::class);
    }
}

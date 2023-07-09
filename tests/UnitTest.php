<?php
namespace PhpUnitConversionTest;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\Map\Factor;
use PhpUnitConversion\Unit;
use PhpUnitConversion\Map as UnitMap;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversionTest\Fixtures\MyUnitType;
use PhpUnitConversionTest\Fixtures\AnotherUnit;

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

    public function testTypeUnits()
    {
        UnitMap::clear();
        UnitMap::add(__DIR__ . '/Fixtures/', __NAMESPACE__ . '\\Fixtures');

        $allUnits = UnitMap\Unit::get();
        $this->assertThat(
            count($allUnits),
            $this->logicalOr(
                $this->equalTo(9),
                $this->equalTo(247)
            )
        );

        $myUnits = UnitMap\Unit::byType(1);
        $this->assertCount(8, $myUnits);
    }

    public function testTypeValues()
    {
        $doubleUnit = new MyUnitType\DoubleUnit(1);

        $typeValue = $doubleUnit();
        $this->assertEquals(129, $typeValue);

        $oneUnit = MyUnitType::from($typeValue);
        $this->assertInstanceOf(MyUnitType\OneUnit::class, $oneUnit);
        $this->assertEquals(1, $oneUnit->to(MyUnitType\DoubleUnit::class)->getValue());
    }

    public function testTypeValuesFloat()
    {
        $doubleUnit = new MyUnitType\DoubleUnit(1.24);

        $typeValue = $doubleUnit();
        $this->assertEquals(129.48, $typeValue);

        $oneUnit = MyUnitType::from($typeValue);
        $this->assertInstanceOf(MyUnitType\OneUnit::class, $oneUnit);
        $this->assertEquals(1.24, $oneUnit->to(MyUnitType\DoubleUnit::class)->getValue());
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

    public function testToJson()
    {
        $unit = new MyUnitType\OneUnit(1);

        $expected = [
            'value' => 1,
            'symbol' => 'u',
            'label' => 'unit',
        ];

        $this->assertEquals($expected, $unit->jsonSerialize());
        $this->assertEquals(json_encode($expected), json_encode($unit));
    }

    public function testInvalidInvocation()
    {
        $this->expectException(Exception::class);

        Unit::nearest(new MyUnitType\OneUnit(1));
    }

    public function testUnsupportedFrom()
    {
        $this->expectException(Exception::class);

        $unit = new MyUnitType\OneUnit(1);
        $unit->from(AnotherUnit\OneUnit::class);
    }

    public function testNearestUnsupported()
    {
        $this->expectException(\InvalidArgumentException::class);

        $unit = MyUnitType\OneUnit::nearest("1");
    }

    public function testFromString()
    {
        $unit = MyUnitType\OneUnit::from('1 u');
        $this->assertInstanceOf(MyUnitType\OneUnit::class, $unit);

        $unit = MyUnitType\OneUnit::from('1 unit');
        $this->assertInstanceOf(MyUnitType\OneUnit::class, $unit);
    }

    public function testNearestUnit()
    {
        UnitMap::clear();
        UnitMap::add(__DIR__ . '/../src/Unit/', 'PhpUnitConversion\\Unit');

        $grams = new Mass\Gram(850);

        $unit = Mass::nearest($grams, \PhpUnitConversion\System\Metric::class);

        $this->assertInstanceOf(Mass\HectoGram::class, $unit);
    }

    public function testNearestUnitSmallerSmallest()
    {
        $grams = new Mass\YoctoGram(0.001);

        $unit = Mass::nearest($grams);

        $this->assertInstanceOf(Mass\YoctoGram::class, $unit);
    }

    public function testNearestUnitObject()
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

    public function testMultipleCustomUnits()
    {
        UnitMap::clear();
        UnitMap::add(__DIR__ . '/../src/Unit/Length/Meter.php', 'PhpUnitConversion\\Unit\\Length', Unit\Length::class);
        UnitMap::add(__DIR__ . '/../src/Unit/Length/CentiMeter.php', 'PhpUnitConversion\\Unit\\Length', Unit\Length::class);

        UnitMap::add(__DIR__ . '/../src/Unit/Mass/KiloGram.php', 'PhpUnitConversion\\Unit\\Mass', Unit\Mass::class);
        UnitMap::add(__DIR__ . '/../src/Unit/Mass/Gram.php', 'PhpUnitConversion\\Unit\\Mass', Unit\Mass::class);

        $lengthUnits = Factor::byType(Unit\Length::TYPE);
        $this->assertCount(2, $lengthUnits);
        $this->assertArrayHasKey(Unit\Length\CentiMeter::class, $lengthUnits);
        $this->assertArrayHasKey(Unit\Length\Meter::class, $lengthUnits);
        $this->assertSame(Unit\Length\CentiMeter::FACTOR, $lengthUnits[Unit\Length\CentiMeter::class]);
        $this->assertSame(1, $lengthUnits[Unit\Length\Meter::class]);

        $lengthUnits = Factor::byType(Unit\Mass::TYPE);
        $this->assertCount(2, $lengthUnits);
        $this->assertArrayHasKey(Unit\Mass\KiloGram::class, $lengthUnits);
        $this->assertArrayHasKey(Unit\Mass\Gram::class, $lengthUnits);
        $this->assertSame(Unit\Mass\KiloGram::FACTOR, $lengthUnits[Unit\Mass\KiloGram::class]);
        $this->assertSame(1, $lengthUnits[Unit\Mass\Gram::class]);
        UnitMap::add(__DIR__.'/../src/Unit', 'PhpUnitConversion\\Unit', null);
    }
}

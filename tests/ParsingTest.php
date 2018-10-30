<?php

namespace PhpUnitConversionTest;

use Generator;
use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception\UnsupportedConversionException;
use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class ParsingTest extends TestCase
{
    /**
     * @dataProvider getUnitClassesWithSymbols
     * @param string $baseClass
     * @param string $unitClass
     */
    public function testParseStringWithIntegerAndSymbol($baseClass, $unitClass)
    {
        /** @var Unit $unit */
        $unit = new $unitClass();
        $target = 9384 . ' ' . $unit->getSymbol();
        /** @var Unit $result */
        $result = $baseClass::from($target);
        $this->assertInstanceOf($unitClass, $result);
        $this->assertEquals($result->getValue(), 9384.);
        $this->assertEquals($result->getSymbol(), $unit->getSymbol());
    }

    /**
     * @dataProvider getUnitClassesWithSymbols
     * @param string $baseClass
     * @param string $unitClass
     */
    public function testParseStringWithFloatAndSymbol($baseClass, $unitClass)
    {
        /** @var Unit $unit */
        $unit = new $unitClass();
        $target = 9384.56 . ' ' . $unit->getSymbol();
        /** @var Unit $result */
        $result = $baseClass::from($target);
        $this->assertInstanceOf($unitClass, $result);
        $this->assertEquals($result->getValue(), 9384.56);
        $this->assertEquals($result->getSymbol(), $unit->getSymbol());
    }

    /**
     * @dataProvider getUnitClassesWithLabels
     * @param string $baseClass
     * @param string $unitClass
     */
    public function testParseStringWithIntegerAndLabel($baseClass, $unitClass)
    {
        /** @var Unit $unit */
        $unit = new $unitClass();
        $target = 9384 . ' ' . $unit->getLabel();
        /** @var Unit $result */
        $result = $baseClass::from($target);
        $this->assertInstanceOf($unitClass, $result);
        $this->assertEquals($result->getValue(), 9384.);
        $this->assertEquals($result->getLabel(), $unit->getLabel());
    }

    /**
     * @dataProvider getUnitClassesWithLabels
     * @param string $baseClass
     * @param string $unitClass
     */
    public function testParseStringWithFloatAndLabel($baseClass, $unitClass)
    {
        /** @var Unit $unit */
        $unit = new $unitClass();
        $target = 9384.56 . ' ' . $unit->getLabel();
        /** @var Unit $result */
        $result = $baseClass::from($target);
        $this->assertInstanceOf($unitClass, $result);
        $this->assertEquals($result->getValue(), 9384.56);
        $this->assertEquals($result->getLabel(), $unit->getLabel());
    }

    /**
     * @return Generator
     */
    public function getUnitClassesWithSymbols()
    {
        foreach (Unit::getUnitsBySymbol() as $unitType => $typesBySymbol) {
            foreach ($typesBySymbol as $symbol => $unit) {
                $type = get_class($unit);
                $baseType = get_class(Unit::getBaseUnits()[$unitType]);
                yield $this->getDescription($type) . ' as ' . $symbol => [$baseType, $type];
            }
        }
    }

    /**
     * @return Generator
     */
    public function getUnitClassesWithLabels()
    {
        foreach (Unit::getUnitsByLabel() as $unitType => $typesByLabel) {
            foreach ($typesByLabel as $label => $unit) {
                $type = get_class($unit);
                $baseType = get_class(Unit::getBaseUnits()[$unitType]);
                yield $this->getDescription($type) . ' as ' . $label => [$baseType, $type];
            }
        }
    }

    /**
     * @param string $fqn
     * @return string
     */
    protected function getClassName($fqn)
    {
        return substr($fqn, strrpos($fqn, '\\') + 1);
    }

    /**
     * @param string $fqn
     * @return string
     */
    protected function getDescription($fqn)
    {
        return $this->getClassName($fqn) . '(' . UnitType::search($fqn::TYPE) . ')';
    }
}

<?php

namespace PhpUnitConversionTest;

use Generator;
use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception\UnsupportedConversionException;
use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;
use PhpUnitConversion\Map as UnitMap;

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
        foreach (UnitMap\Symbol::get() as $unitTypeClass => $units) {
            foreach ($units as $symbol => $unitClass) {
                yield $this->getDescription($unitClass) . ' as ' . $symbol => [$unitClass::BASE_UNIT, $unitClass];
            }
        }
    }

    /**
     * @return Generator
     */
    public function getUnitClassesWithLabels()
    {
        foreach (UnitMap\Label::get() as $unitTypeClass => $units) {
            foreach ($units as $label => $unitClass) {
                yield $this->getDescription($unitClass) . ' as ' . $label => [$unitClass::BASE_UNIT, $unitClass];
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

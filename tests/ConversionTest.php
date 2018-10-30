<?php

namespace PhpUnitConversionTest;

use Generator;
use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception\UnsupportedConversionException;
use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;
use PhpUnitConversion\Map as UnitMap;

class ConversionTest extends TestCase
{
    /**
     * @dataProvider getUnitClassesWithMatchingTypes
     * @param string $firstClass
     * @param string $secondClass
     * @throws UnsupportedConversionException
     */
    public function testFirstTypeAsObjectConvertsToSecondType($firstClass, $secondClass)
    {
        /** @var Unit $object */
        $object = new $firstClass(9384.56);
        $result = $object->to($secondClass);
        $this->assertNotNull($result);
        $this->assertInstanceOf($secondClass, $result);
    }

    /**
     * @dataProvider getUnitClassesWithNonMatchingTypes
     * @param string $firstClass
     * @param string $secondClass
     * @throws UnsupportedConversionException
     */
    public function testFirstTypeAsObjectDoesNotConvertToSecondType($firstClass, $secondClass)
    {
        /** @var Unit $object */
        $object = new $firstClass(9384.56);
        $this->assertNull($object->to($secondClass));
    }

    /**
     * @dataProvider getUnitClassesWithNonMatchingTypes
     * @param string $firstClass
     * @param string $secondClass
     * @expectedException \PhpUnitConversion\Exception\UnsupportedConversionException
     * @throws UnsupportedConversionException
     */
    public function testFirstTypeAsObjectDoesNotConvertToSecondTypeAsObject($firstClass, $secondClass)
    {
        /** @var Unit $object */
        $object = new $firstClass(9384.56);
        $object->to(new $secondClass);
    }

    /**
     * @return Generator
     */
    public function getUnitClassesWithMatchingTypes()
    {
        foreach (UnitType::values() as $unitType) {
            $unitTypes = UnitMap\Unit::byType($unitType->getValue());

            foreach ($unitTypes as $left) {
                foreach ($unitTypes as $right) {
                    yield $this->getDescription($left) . ' to ' . $this->getDescription($right) => [$left, $right];
                }
            }
        }
    }

    /**
     * @return Generator
     */
    public function getUnitClassesWithNonMatchingTypes()
    {
        foreach (UnitType::values() as $unitType) {
            $matchingUnitTypes = UnitMap\Unit::byType($unitType->getValue());
            $nonMatchingUnitTypes = array_filter(UnitMap\Unit::get(), function ($unitClass) use ($unitType) {
                return $unitType->getValue() !== $unitClass::TYPE;
            });

            foreach ($matchingUnitTypes as $left) {
                foreach ($nonMatchingUnitTypes as $right) {
                    yield $this->getDescription($left) . ' to ' . $this->getDescription($right) => [$left, $right];
                }
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

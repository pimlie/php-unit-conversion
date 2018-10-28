<?php

namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\TypeRegistry;
use PhpUnitConversionTest\Fixtures\MyUnitType;

class TypeRegistryTest extends TestCase
{
    public function testSubDirectoryListing()
    {
        $registry = new TypeRegistry();
        $registry->loadDirectory(
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR,
            'PhpUnitConversionTest\\Fixtures\\'
        );

        $this->assertArraySubset([
            MyUnitType\AdditionUnit::class,
            MyUnitType\DoubleUnit::class,
            MyUnitType\DoubleUnitRelativeFromHalf::class,
            MyUnitType\DoubleUnitRelativeFromThird::class,
            MyUnitType\HalfUnit::class,
            MyUnitType\OneUnit::class,
            MyUnitType\RelativeAdditionUnit::class,
            MyUnitType\ThirdUnitRelativeFromBase::class,
        ], $registry->getTypes());

        $registry->clear();
        $this->assertEmpty($registry->getTypes());
    }

    public function testDirectoryListing()
    {
        $registry = new TypeRegistry();
        $registry->loadDirectory(
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR,
            'PhpUnitConversionTest\\Fixtures\\',
            '*.php'
        );

        $this->assertArraySubset([
            MyUnitType::class,
        ], $registry->getTypes());

        $registry->clear();
        $this->assertEmpty($registry->getTypes());
    }

    public function testMultipleDirectoryListings()
    {
        $registry = new TypeRegistry();
        $registry->loadDirectory(
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR,
            'PhpUnitConversionTest\\Fixtures\\',
            '*.php'
        );
        $registry->loadDirectory(
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR,
            'PhpUnitConversionTest\\Fixtures\\'
        );

        $this->assertArraySubset([
            MyUnitType::class,
            MyUnitType\AdditionUnit::class,
            MyUnitType\DoubleUnit::class,
            MyUnitType\DoubleUnitRelativeFromHalf::class,
            MyUnitType\DoubleUnitRelativeFromThird::class,
            MyUnitType\HalfUnit::class,
            MyUnitType\OneUnit::class,
            MyUnitType\RelativeAdditionUnit::class,
            MyUnitType\ThirdUnitRelativeFromBase::class,
        ], $registry->getTypes());

        $registry->clear();
        $this->assertEmpty($registry->getTypes());
    }
}

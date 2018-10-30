<?php
namespace PhpUnitConversionTest\Fixtures;

use PhpUnitConversion\Unit;

class MyUnitType extends Unit
{
    const TYPE = 1;

    const BASE_UNIT = MyUnitType\OneUnit::class;
}

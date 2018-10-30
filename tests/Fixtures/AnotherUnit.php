<?php
namespace PhpUnitConversionTest\Fixtures;

use PhpUnitConversion\Unit;

class AnotherUnit extends Unit
{
    const TYPE = 2;

    const BASE_UNIT = AnotherUnit\OneUnit::class;
}

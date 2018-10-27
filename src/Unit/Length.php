<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Length extends Unit
{
    const TYPE = UnitType::LENGTH;

    const BASE_UNIT = Length\Meter::class;
}

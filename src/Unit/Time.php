<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Time extends Unit
{
    const TYPE = UnitType::TIME;

    const BASE_UNIT = Time\Second::class;
}

<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Temperature extends Unit
{
    const TYPE = UnitType::TEMPERATURE;

    const BASE_UNIT = Temperature\Kelvin::class;
}

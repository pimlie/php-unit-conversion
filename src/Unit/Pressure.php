<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Pressure extends Unit
{
    const TYPE = UnitType::PRESSURE;

    const BASE_UNIT = Pressure\Pascal::class;
}

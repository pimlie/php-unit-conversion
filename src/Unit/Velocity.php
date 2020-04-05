<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Velocity extends Unit
{
    const TYPE = UnitType::VELOCITY;

    const BASE_UNIT = Velocity\MeterPerSecond::class;
}

<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Volume extends Unit
{
    const TYPE = UnitType::VOLUME;
    
    const BASE_UNIT = Volume\CubicMeter::class;
}
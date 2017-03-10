<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Area extends Unit
{
    const TYPE = UnitType::AREA;
    
    const BASE_UNIT = Area\SquareMeter::class;
}

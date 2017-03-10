<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Mass extends Unit
{
    const TYPE = UnitType::MASS;
    
    const BASE_UNIT = Mass\Gram::class;
}

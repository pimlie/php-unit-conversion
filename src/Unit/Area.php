<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;

class Area extends Unit
{
    const TYPE = Unit::TYPE_AREA;
    
    const BASE_UNIT = Area\SquareMeter::class;
}
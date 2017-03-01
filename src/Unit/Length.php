<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;

class Length extends Unit
{
    const TYPE = Unit::TYPE_LENGTH;
    
    const BASE_UNIT = Length\Meter::class;
}
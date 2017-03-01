<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;

class Mass extends Unit
{
    const TYPE = Unit::TYPE_MASS;
    
    const BASE_UNIT = Mass\Gram::class;
}
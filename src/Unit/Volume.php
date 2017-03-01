<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;

class Volume extends Unit
{
    const TYPE = Unit::TYPE_VOLUME;
    
    const BASE_UNIT = Volume\CubicMeter::class;
}
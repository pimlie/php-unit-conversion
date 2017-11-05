<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USLiquidQuart extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/4;
    
    const SYMBOL = 'qt';
    const LABEL = 'US quart';
}

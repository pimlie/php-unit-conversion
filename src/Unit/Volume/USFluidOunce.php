<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USFluidOunce extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/128;
    
    const SYMBOL = 'fl oz';
    const LABEL = 'US fluid ounce';
}

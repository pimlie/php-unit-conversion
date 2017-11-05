<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class OilBarrel extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 42;
    
    const SYMBOL = 'bbl';
    const LABEL = 'barrel';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USMinim extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/61440;
    
    const SYMBOL = 'm';
    const LABEL = 'US minim';
}

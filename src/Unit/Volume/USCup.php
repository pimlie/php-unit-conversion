<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USCup extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/16;
    
    const SYMBOL = 'cp';
    const LABEL = 'US cup';
}

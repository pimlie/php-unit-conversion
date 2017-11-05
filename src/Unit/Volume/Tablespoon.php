<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Tablespoon extends USLiquidGallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/256;
    
    const SYMBOL = 'Tbsp';
    const LABEL = 'tablespoon';
}

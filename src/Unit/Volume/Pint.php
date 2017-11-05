<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Pint extends Gallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/8;
    
    const SYMBOL = 'pt';
    const LABEL = 'pint';
}

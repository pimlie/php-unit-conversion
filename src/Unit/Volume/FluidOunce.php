<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class FluidOunce extends Gallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/160;
    
    const SYMBOL = 'fl oz';
    const LABEL = 'fluid ounce';
}

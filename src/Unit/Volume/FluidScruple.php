<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class FluidScruple extends Gallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/3840;
    
    const SYMBOL = 'fl s';
    const LABEL = 'fluid scruple';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Gill extends Gallon
{
    use HasRelativeFactor;
    
    const FACTOR = 1/32;
    
    const SYMBOL = 'gi';
    const LABEL = 'gill';
}

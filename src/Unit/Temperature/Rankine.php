<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Traits\HasRelativeFactor;

class Rankine extends Fahrenheit
{
    use HasRelativeFactor;
    
    const FACTOR = 1;
    const ADDITION = -459.67;
    
    const SYMBOL = '°R';
    const LABEL = 'rankine';
}

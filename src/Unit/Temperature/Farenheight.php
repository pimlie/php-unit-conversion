<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Traits\HasFactor;

class Farenheight extends Celsius
{
    use HasFactor;
    
    const FACTOR = 0.555555556;
    const ADDITION = -32;
    
    const SYMBOL = '°F';
    const LABEL = 'farenheight';
}

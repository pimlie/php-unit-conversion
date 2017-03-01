<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ShortHundredWeight extends AvoirdupoisPound implements USC
{
    use HasRelativeFactor;
    
    const FACTOR = 1/100;
    
    const SYMBOL = 'sh cwt';
    const LABEL = 'short hundredweight';
}
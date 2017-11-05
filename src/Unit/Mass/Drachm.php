<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Drachm extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 1/256;
    
    const SYMBOL = 'dr';
    const LABEL = 'drachm';
}

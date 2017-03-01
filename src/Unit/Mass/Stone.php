<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Stone extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 1/14;
    
    const SYMBOL = 'st';
    const LABEL = 'stone';
}
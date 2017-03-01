<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Point extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 2591;
    
    const SYMBOL = 'p';
    const LABEL = 'point';
}
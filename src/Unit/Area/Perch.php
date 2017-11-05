<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Perch extends SquareYard
{
    use HasRelativeFactor;
    
    const FACTOR = 30.25;
    
    const SYMBOL = 'perch';
    const LABEL = 'square perch';
}

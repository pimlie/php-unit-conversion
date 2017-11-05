<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class SquareInch extends SquareYard
{
    use HasRelativeFactor;
    
    const FACTOR = 1/1296;
    
    const SYMBOL = 'in2';
    const LABEL = 'square inch';
}

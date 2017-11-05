<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Unit\Area;
use PhpUnitConversion\Traits\HasFactor;

class SquareInternationalYard extends Area
{
    use HasFactor;
    
    const FACTOR = 0.83612736;
    
    const SYMBOL = 'sq yd';
    const LABEL = 'square yard';
}

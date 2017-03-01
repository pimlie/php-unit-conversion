<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Length;
use PhpUnitConversion\Traits\HasFactor;

class InternationalYard extends Length
{
    use HasFactor;
    
    const FACTOR = 0.9144;
    
    const SYMBOL = 'yd';
    const LABEL = 'yard';
}
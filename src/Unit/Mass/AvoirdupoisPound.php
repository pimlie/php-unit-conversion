<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Traits\HasFactor;

class AvoirdupoisPound extends Mass
{
    use HasFactor;
    
    const FACTOR = 453.59237;
    
    const SYMBOL = 'lb';
    const LABEL = 'pound';
}
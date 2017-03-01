<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Traits\HasFactor;

class TroyOunce extends Mass implements Imperial
{
    use HasFactor;
    
    const FACTOR = 31.1034768;
    
    const SYMBOL = 'oz t';
    const LABEL = 'troy ounce';
}
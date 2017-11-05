<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class DryQuart extends DryPint
{
    use HasRelativeFactor;
    
    const FACTOR = 2;
    
    const SYMBOL = 'qt';
    const LABEL = '(dry) quart';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class NauticalMile extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 2025.36;
    
    const SYMBOL = 'NM';
    const LABEL = 'nautical mile';
}

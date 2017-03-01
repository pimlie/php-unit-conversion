<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Mile extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 1 / 1760;
    
    const SYMBOL = 'mi';
    const LABEL = 'mile';
}
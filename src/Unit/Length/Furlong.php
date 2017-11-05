<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Furlong extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 220;
    
    const SYMBOL = 'fur';
    const LABEL = 'furlong';
}

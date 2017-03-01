<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;
use PhpUnitConversion\System\Imperial;

class Thou extends InternationalYard implements Imperial
{
    use HasRelativeFactor;
    
    const FACTOR = 36000;
    
    const SYMBOL = 'th';
    const LABEL = 'thou';
}
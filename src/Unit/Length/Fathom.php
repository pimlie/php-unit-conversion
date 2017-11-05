<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Fathom extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 2;
    
    const SYMBOL = 'ftm';
    const LABEL = 'fathom';
}

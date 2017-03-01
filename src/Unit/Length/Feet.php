<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Feet extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 3;
    
    const SYMBOL = 'ft';
    const LABEL = 'foot';
}
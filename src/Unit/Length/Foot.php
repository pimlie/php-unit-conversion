<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Foot extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 1/3;
    
    const SYMBOL = 'ft';
    const LABEL = 'foot';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Inch extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 36;
    
    const SYMBOL = 'in';
    const LABEL = 'inch';
}
<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Link extends Yard
{
    use HasRelativeFactor;
    
    const FACTOR = 0.22;
    
    const SYMBOL = 'link';
    const LABEL = 'link';
}

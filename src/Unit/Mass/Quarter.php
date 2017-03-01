<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Quarter extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 1/28;
    
    const SYMBOL = 'qr';
    const LABEL = 'quarter';
}
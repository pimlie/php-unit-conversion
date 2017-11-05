<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Grain extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 1/7000;
    
    const SYMBOL = 'gr';
    const LABEL = 'grain';
}

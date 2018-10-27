<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Ounce extends Pound
{
    use HasRelativeFactor;

    const FACTOR = 1/16;

    const SYMBOL = 'oz';
    const LABEL = 'ounce';
}

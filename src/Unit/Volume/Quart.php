<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Quart extends Gallon
{
    use HasRelativeFactor;

    const FACTOR = 1/4;

    const SYMBOL = 'qt';
    const LABEL = 'quart';
}

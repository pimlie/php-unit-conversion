<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Point extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 1/2592;

    const SYMBOL = 'p';
    const LABEL = 'point';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class CubicYard extends CubicInch
{
    use HasRelativeFactor;

    const FACTOR = 27 * 1728;

    const SYMBOL = 'yd3';
    const LABEL = 'cubic yard';
}

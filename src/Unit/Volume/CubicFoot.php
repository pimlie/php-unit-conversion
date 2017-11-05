<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class CubicFoot extends CubicInch
{
    use HasRelativeFactor;

    const FACTOR = 1728;

    const SYMBOL = 'ft3';
    const LABEL = 'cubic foot';
}

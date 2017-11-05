<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class AcreFoot extends CubicInch
{
    use HasRelativeFactor;

    const FACTOR = 43560 * 1728;

    const SYMBOL = 'acre ft';
    const LABEL = 'acre-foot';
}

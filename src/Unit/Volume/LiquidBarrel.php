<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class LiquidBarrel extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 31.5;

    const SYMBOL = 'bbl';
    const LABEL = 'barrel';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USLiquidPint extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 1/8;

    const SYMBOL = 'pt';
    const LABEL = 'US pint';
}

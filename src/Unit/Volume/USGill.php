<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USGill extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 1/32;

    const SYMBOL = 'gi';
    const LABEL = 'US gill';
}

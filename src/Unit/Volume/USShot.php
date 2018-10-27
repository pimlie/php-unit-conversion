<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USShot extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 1/(85 + 1/3);

    const SYMBOL = 'gi';
    const LABEL = 'US gill';
}

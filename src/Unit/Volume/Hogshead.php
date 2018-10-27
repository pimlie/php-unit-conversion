<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Hogshead extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 63;

    const SYMBOL = 'bbl';
    const LABEL = 'hogshead';
}

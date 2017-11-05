<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\HasFactor;

class USLiquidGallon extends Volume implements USC
{
    use HasFactor;

    const FACTOR = 0.003785411784;

    const SYMBOL = 'gal';
    const LABEL = 'US gallon';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\HasFactor;

class DryPint extends Volume implements USC
{
    use HasFactor;

    const FACTOR = 0.0005506104713575;

    const SYMBOL = 'pt';
    const LABEL = '(dry) pt';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MegaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E6;

    const SYMBOL = 'Mbar';
    const LABEL = 'megabar';
}

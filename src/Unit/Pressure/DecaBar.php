<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DecaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E1;

    const SYMBOL = 'dabar';
    const LABEL = 'decabar';
}

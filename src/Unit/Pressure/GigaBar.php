<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class GigaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E9;

    const SYMBOL = 'Gbar';
    const LABEL = 'gigabar';
}

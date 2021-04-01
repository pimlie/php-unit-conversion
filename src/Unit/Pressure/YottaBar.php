<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YottaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E24;

    const SYMBOL = 'Ybar';
    const LABEL = 'yottabar';
}

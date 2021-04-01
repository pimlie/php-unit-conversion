<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MilliBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-3;

    const SYMBOL = 'mbar';
    const LABEL = 'millibar';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZeptoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-21;

    const SYMBOL = 'zbar';
    const LABEL = 'zeptobar';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YoctoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-24;

    const SYMBOL = 'ybar';
    const LABEL = 'yoctobar';
}

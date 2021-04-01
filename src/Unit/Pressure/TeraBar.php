<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class TeraBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E12;

    const SYMBOL = 'Tbar';
    const LABEL = 'terabar';
}

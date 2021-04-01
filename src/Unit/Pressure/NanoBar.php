<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class NanoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-9;

    const SYMBOL = 'nbar';
    const LABEL = 'nanobar';
}

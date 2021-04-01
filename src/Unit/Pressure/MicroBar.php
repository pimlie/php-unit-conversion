<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MicroBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-6;

    const SYMBOL = 'μbar';
    const LABEL = 'microbar';
}

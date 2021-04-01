<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class KiloBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E3;

    const SYMBOL = 'kbar';
    const LABEL = 'kilobar';
}

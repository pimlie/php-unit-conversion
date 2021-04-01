<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZettaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E21;

    const SYMBOL = 'Zbar';
    const LABEL = 'zettabar';
}

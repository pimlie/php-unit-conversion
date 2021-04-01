<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class DeciPascal extends Pascal implements Metric
{
    const FACTOR = 1E-1;

    const SYMBOL = 'dPa';
    const LABEL = 'decipascal';
}

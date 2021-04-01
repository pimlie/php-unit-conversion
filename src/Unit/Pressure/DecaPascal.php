<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class DecaPascal extends Pascal implements Metric
{
    const FACTOR = 1E1;

    const SYMBOL = 'daPa';
    const LABEL = 'decapascal';
}

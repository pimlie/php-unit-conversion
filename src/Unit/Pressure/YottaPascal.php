<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class YottaPascal extends Pascal implements Metric
{
    const FACTOR = 1E24;

    const SYMBOL = 'YPa';
    const LABEL = 'yottapascal';
}

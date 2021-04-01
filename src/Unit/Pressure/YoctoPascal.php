<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class YoctoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-24;

    const SYMBOL = 'yPa';
    const LABEL = 'yoctopascal';
}

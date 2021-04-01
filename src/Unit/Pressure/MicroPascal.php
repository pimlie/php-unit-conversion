<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class MicroPascal extends Pascal implements Metric
{
    const FACTOR = 1E-6;

    const SYMBOL = 'μPa';
    const LABEL = 'micropascal';
}

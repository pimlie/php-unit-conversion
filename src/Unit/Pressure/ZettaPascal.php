<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class ZettaPascal extends Pascal implements Metric
{
    const FACTOR = 1E21;

    const SYMBOL = 'ZPa';
    const LABEL = 'zettapascal';
}

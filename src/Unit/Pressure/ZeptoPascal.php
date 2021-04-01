<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class ZeptoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-21;

    const SYMBOL = 'zPa';
    const LABEL = 'zeptopascal';
}

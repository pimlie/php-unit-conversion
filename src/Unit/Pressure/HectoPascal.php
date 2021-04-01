<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class HectoPascal extends Pascal implements Metric
{
    const FACTOR = 1E2;

    const SYMBOL = 'hPa';
    const LABEL = 'hectopascal';
}

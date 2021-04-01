<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class KiloPascal extends Pascal implements Metric
{
    const FACTOR = 1E3;

    const SYMBOL = 'kPa';
    const LABEL = 'kilopascal';
}

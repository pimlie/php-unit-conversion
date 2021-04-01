<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class TeraPascal extends Pascal implements Metric
{
    const FACTOR = 1E12;

    const SYMBOL = 'TPa';
    const LABEL = 'terapascal';
}

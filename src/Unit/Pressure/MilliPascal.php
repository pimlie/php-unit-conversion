<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class MilliPascal extends Pascal implements Metric
{
    const FACTOR = 1E-3;

    const SYMBOL = 'mPa';
    const LABEL = 'millipascal';
}

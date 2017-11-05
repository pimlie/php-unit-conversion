<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicMilliMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-9;

    const SYMBOL = 'mm3';
    const LABEL = 'cubic millimeter';
}

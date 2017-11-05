<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicHectoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E6;

    const SYMBOL = 'hm3';
    const LABEL = 'cubic hectometer';
}

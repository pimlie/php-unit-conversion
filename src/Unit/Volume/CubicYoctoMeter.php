<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicYoctoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-72;

    const SYMBOL = 'ym3';
    const LABEL = 'cubic yoctometer';
}

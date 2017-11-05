<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicDeciMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-3;

    const SYMBOL = 'dm3';
    const LABEL = 'cubic decimeter';
}

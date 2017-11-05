<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicExaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E54;

    const SYMBOL = 'Em3';
    const LABEL = 'cubic exameter';
}

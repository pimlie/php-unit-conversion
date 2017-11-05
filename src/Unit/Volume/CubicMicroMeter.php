<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicMicroMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-18;

    const SYMBOL = 'μm3';
    const LABEL = 'cubic micrometer';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicCentiMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-6;

    const SYMBOL = 'cm3';
    const LABEL = 'cubic centimeter';
}

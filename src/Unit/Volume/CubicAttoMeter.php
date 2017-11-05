<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicAttoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-54;

    const SYMBOL = 'am3';
    const LABEL = 'cubic attometer';
}

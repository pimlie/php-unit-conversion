<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicNanoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-27;

    const SYMBOL = 'nm3';
    const LABEL = 'cubic nanometer';
}

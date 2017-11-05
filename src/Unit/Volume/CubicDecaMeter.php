<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicDecaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E3;

    const SYMBOL = 'dam3';
    const LABEL = 'cubic decameter';
}

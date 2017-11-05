<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicFemtoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-45;

    const SYMBOL = 'fm3';
    const LABEL = 'cubic femtometer';
}

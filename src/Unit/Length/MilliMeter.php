<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class MilliMeter extends Meter implements Metric
{
    const FACTOR = 1E-3;

    const SYMBOL = 'mm';
    const LABEL = 'millimeter';
}

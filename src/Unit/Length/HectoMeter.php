<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class HectoMeter extends Meter implements Metric
{
    const FACTOR = 1E2;

    const SYMBOL = 'hm';
    const LABEL = 'hectometer';
}

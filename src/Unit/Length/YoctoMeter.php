<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class YoctoMeter extends Meter implements Metric
{
    const FACTOR = 1E-24;

    const SYMBOL = 'ym';
    const LABEL = 'yoctometer';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class MicroMeter extends Meter implements Metric
{
    const FACTOR = 1E-6;

    const SYMBOL = 'μm';
    const LABEL = 'micrometer';
}

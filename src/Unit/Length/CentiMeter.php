<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class CentiMeter extends Meter implements Metric
{
    const FACTOR = 1E-2;

    const SYMBOL = 'cm';
    const LABEL = 'centimeter';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class DeciMeter extends Meter implements Metric
{
    const FACTOR = 1E-1;

    const SYMBOL = 'dm';
    const LABEL = 'decimeter';
}

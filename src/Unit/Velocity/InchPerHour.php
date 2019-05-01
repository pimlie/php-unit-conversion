<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class InchPerHour extends Velocity implements Metric
{
    const FACTOR = 1/141732.3;

    const SYMBOL = 'iph';
    const LABEL = 'inch per hour';
}

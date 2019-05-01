<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class MilePerHour extends Velocity implements Metric
{
    const FACTOR = 1/2.236936;

    const SYMBOL = 'mph';
    const LABEL = 'mile per hour';
}

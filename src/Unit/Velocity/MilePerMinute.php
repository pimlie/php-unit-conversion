<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class MilePerMinute extends Velocity implements Metric
{
    const FACTOR = 26.82240;

    const SYMBOL = 'mpm';
    const LABEL = 'mile per minute';
}

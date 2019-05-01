<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class FootPerHour extends Velocity implements Metric
{
    const FACTOR = 1/11811;

    const SYMBOL = 'fph';
    const LABEL = 'foot per hour';
}

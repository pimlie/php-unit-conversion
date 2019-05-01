<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class FootPerMinute extends Velocity implements Metric
{
    const FACTOR = 1/196.85;

    const SYMBOL = 'fpm';
    const LABEL = 'foot per minute';
}

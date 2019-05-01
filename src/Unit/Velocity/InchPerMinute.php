<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class InchPerMinute extends Velocity implements Metric
{
    const FACTOR = 1/2362.205;

    const SYMBOL = 'ipm';
    const LABEL = 'inch per minute';
}

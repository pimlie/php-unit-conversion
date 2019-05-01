<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class MilePerSecond extends Velocity implements Metric
{
    const FACTOR = 1609.344;

    const SYMBOL = 'mps';
    const LABEL = 'mile per second';
}

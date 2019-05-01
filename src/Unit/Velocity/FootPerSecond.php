<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class FootPerSecond extends Velocity implements Metric
{
    const FACTOR = 1/3.280840;

    const SYMBOL = 'fps';
    const LABEL = 'foot per second';
}

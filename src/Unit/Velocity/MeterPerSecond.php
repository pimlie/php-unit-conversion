<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;
use PhpUnitConversion\Traits\BaseUnit;

class MeterPerSecond extends Velocity implements Metric
{
    use BaseUnit;

    const FACTOR = 1;

    const SYMBOL = 'm/s';
    const LABEL = 'meter per second';
}

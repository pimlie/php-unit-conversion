<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class InchPerSecond extends Velocity implements Metric
{
    const FACTOR = 1/39.37008;

    const SYMBOL = 'ips';
    const LABEL = 'inch per second';
}

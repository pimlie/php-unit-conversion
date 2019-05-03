<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class KilometrePerHour extends Velocity implements Metric
{
    const FACTOR = 1/3.6;

    const SYMBOL = 'km/h';
    const LABEL = 'kilometre per hour';
}

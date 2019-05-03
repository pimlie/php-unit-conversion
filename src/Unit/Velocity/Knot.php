<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Velocity;

class Knot extends Velocity implements Metric
{
    const FACTOR = 1/1.943844;

    const SYMBOL = 'kn';
    const LABEL = 'knot';
}

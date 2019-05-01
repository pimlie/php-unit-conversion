<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class MilePerHour extends Velocity implements Imperial, USC
{
    const FACTOR = 1/2.236936;

    const SYMBOL = 'mph';
    const LABEL = 'mile per hour';
}

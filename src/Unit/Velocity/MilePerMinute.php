<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class MilePerMinute extends Velocity implements Imperial, USC
{
    const FACTOR = 26.82240;

    const SYMBOL = 'mpm';
    const LABEL = 'mile per minute';
}

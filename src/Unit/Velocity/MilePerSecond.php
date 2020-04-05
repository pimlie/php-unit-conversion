<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class MilePerSecond extends Velocity implements Imperial, USC
{
    const FACTOR = 1609.344;

    const SYMBOL = 'mps';
    const LABEL = 'mile per second';
}

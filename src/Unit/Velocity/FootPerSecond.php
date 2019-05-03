<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class FootPerSecond extends Velocity implements Imperial, USC
{
    const FACTOR = 1/3.280840;

    const SYMBOL = 'fps';
    const LABEL = 'foot per second';
}

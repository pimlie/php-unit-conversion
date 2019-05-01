<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class FootPerMinute extends Velocity implements Imperial, USC
{
    const FACTOR = 1/196.85;

    const SYMBOL = 'fpm';
    const LABEL = 'foot per minute';
}

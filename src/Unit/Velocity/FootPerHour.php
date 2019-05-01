<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class FootPerHour extends Velocity implements Imperial, USC
{
    const FACTOR = 1/11811;

    const SYMBOL = 'fph';
    const LABEL = 'foot per hour';
}

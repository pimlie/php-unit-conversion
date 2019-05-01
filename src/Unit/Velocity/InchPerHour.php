<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class InchPerHour extends Velocity implements Imperial, USC
{
    const FACTOR = 1/141732.3;

    const SYMBOL = 'iph';
    const LABEL = 'inch per hour';
}

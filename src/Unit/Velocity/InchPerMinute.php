<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class InchPerMinute extends Velocity implements Imperial, USC
{
    const FACTOR = 1/2362.205;

    const SYMBOL = 'ipm';
    const LABEL = 'inch per minute';
}

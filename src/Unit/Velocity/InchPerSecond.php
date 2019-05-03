<?php
namespace PhpUnitConversion\Unit\Velocity;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Velocity;

class InchPerSecond extends Velocity implements Imperial, USC
{
    const FACTOR = 1/39.37008;

    const SYMBOL = 'ips';
    const LABEL = 'inch per second';
}

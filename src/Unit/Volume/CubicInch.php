<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\Traits\HasFactor;

class CubicInch extends Volume implements USC
{
    use HasFactor;

    const FACTOR = 0.000016387064;

    const SYMBOL = 'in3';
    const LABEL = 'cubic inch';
}

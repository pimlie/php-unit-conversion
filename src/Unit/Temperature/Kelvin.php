<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Traits\BaseUnit;
use PhpUnitConversion\Traits\HasFactor;

class Kelvin extends Celsius
{
    use HasFactor;

    const FACTOR = 1;
    const ADDITION = -273.15;

    const SYMBOL = 'K';
    const LABEL = 'Kelvin';
}

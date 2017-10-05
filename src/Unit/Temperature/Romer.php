<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Traits\BaseUnit;
use PhpUnitConversion\Traits\HasFactor;

class Romer extends Celsius
{
    use HasFactor;

    const FACTOR = 1.9047619;
    const ADDITION = -7.5;

    const SYMBOL = '°Rø';
    const LABEL = 'Rømer';
}

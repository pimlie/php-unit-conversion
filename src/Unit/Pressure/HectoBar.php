<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class HectoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E2;

    const SYMBOL = 'hbar';
    const LABEL = 'hectobar';
}

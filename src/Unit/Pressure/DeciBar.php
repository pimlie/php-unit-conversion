<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DeciBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-1;

    const SYMBOL = 'dbar';
    const LABEL = 'decibar';
}

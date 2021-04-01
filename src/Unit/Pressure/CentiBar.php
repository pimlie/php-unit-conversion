<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class CentiBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-2;

    const SYMBOL = 'cbar';
    const LABEL = 'centibar';
}

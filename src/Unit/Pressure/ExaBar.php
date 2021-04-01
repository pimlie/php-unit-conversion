<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ExaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E18;

    const SYMBOL = 'Ebar';
    const LABEL = 'exabar';
}

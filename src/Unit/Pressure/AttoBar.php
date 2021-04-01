<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class AttoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-18;

    const SYMBOL = 'abar';
    const LABEL = 'attobar';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class FemtoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-15;

    const SYMBOL = 'fbar';
    const LABEL = 'femtobar';
}

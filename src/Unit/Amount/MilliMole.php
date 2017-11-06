<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MilliMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-3;

    const SYMBOL = 'mmol';
    const LABEL = 'millimole';
}

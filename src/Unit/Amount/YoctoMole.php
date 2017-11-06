<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YoctoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-24;

    const SYMBOL = 'ymol';
    const LABEL = 'yoctomole';
}

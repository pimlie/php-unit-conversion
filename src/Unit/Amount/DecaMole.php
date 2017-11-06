<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DecaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E1;

    const SYMBOL = 'damol';
    const LABEL = 'decamole';
}

<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YottaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E24;

    const SYMBOL = 'Ymol';
    const LABEL = 'yottamole';
}

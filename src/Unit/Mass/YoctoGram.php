<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class YoctoGram extends Gram implements Metric
{
    const FACTOR = 1E-24;

    const SYMBOL = 'yg';
    const LABEL = 'yoctogram';
}

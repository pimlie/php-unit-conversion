<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class YottaGram extends Gram implements Metric
{
    const FACTOR = 1E24;

    const SYMBOL = 'Yg';
    const LABEL = 'yottagram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class GigaGram extends Gram implements Metric
{
    const FACTOR = 1E9;

    const SYMBOL = 'Gg';
    const LABEL = 'gigagram';
}

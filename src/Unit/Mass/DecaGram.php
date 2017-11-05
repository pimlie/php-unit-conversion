<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class DecaGram extends Gram implements Metric
{
    const FACTOR = 1E1;

    const SYMBOL = 'dag';
    const LABEL = 'decagram';
}

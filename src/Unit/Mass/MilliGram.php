<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class MilliGram extends Gram implements Metric
{
    const FACTOR = 1E-3;

    const SYMBOL = 'mg';
    const LABEL = 'milligram';
}

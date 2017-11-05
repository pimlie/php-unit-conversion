<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class DeciGram extends Gram implements Metric
{
    const FACTOR = 1E-1;

    const SYMBOL = 'dg';
    const LABEL = 'decigram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class ZeptoGram extends Gram implements Metric
{
    const FACTOR = 1E-21;

    const SYMBOL = 'zg';
    const LABEL = 'zeptogram';
}

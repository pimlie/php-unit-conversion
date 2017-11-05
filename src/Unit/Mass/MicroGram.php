<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class MicroGram extends Gram implements Metric
{
    const FACTOR = 1E-6;

    const SYMBOL = 'μg';
    const LABEL = 'microgram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class AttoGram extends Gram implements Metric
{
    const FACTOR = 1E-18;

    const SYMBOL = 'ag';
    const LABEL = 'attogram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class ExaGram extends Gram implements Metric
{
    const FACTOR = 1E18;

    const SYMBOL = 'Eg';
    const LABEL = 'exagram';
}

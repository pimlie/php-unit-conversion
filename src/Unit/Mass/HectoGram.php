<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class HectoGram extends Gram implements Metric
{
    const FACTOR = 1E2;

    const SYMBOL = 'hg';
    const LABEL = 'hectogram';
}

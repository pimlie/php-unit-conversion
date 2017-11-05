<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class NanoGram extends Gram implements Metric
{
    const FACTOR = 1E-9;

    const SYMBOL = 'ng';
    const LABEL = 'nanogram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class FemtoGram extends Gram implements Metric
{
    const FACTOR = 1E-15;

    const SYMBOL = 'fg';
    const LABEL = 'femtogram';
}

<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class KiloGram extends Gram implements Metric
{
    const FACTOR = 1E3;

    const SYMBOL = 'kg';
    const LABEL = 'kilogram';
}

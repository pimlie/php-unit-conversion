<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class PicoGram extends Gram implements Metric
{
    const FACTOR = 1E-12;

    const SYMBOL = 'pg';
    const LABEL = 'picogram';
}

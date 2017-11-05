<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class YottaMeter extends Meter implements Metric
{
    const FACTOR = 1E24;

    const SYMBOL = 'Ym';
    const LABEL = 'yottameter';
}

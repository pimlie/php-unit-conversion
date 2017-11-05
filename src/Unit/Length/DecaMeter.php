<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class DecaMeter extends Meter implements Metric
{
    const FACTOR = 1E1;

    const SYMBOL = 'dam';
    const LABEL = 'decameter';
}

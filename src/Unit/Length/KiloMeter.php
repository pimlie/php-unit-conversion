<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class KiloMeter extends Meter implements Metric
{
    const FACTOR = 1E3;

    const SYMBOL = 'km';
    const LABEL = 'kilometer';
}

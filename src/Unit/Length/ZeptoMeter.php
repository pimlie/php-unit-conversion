<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class ZeptoMeter extends Meter implements Metric
{
    const FACTOR = 1E-21;

    const SYMBOL = 'zm';
    const LABEL = 'zeptometer';
}

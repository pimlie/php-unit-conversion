<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class PicoMeter extends Meter implements Metric
{
    const FACTOR = 1E-12;

    const SYMBOL = 'pm';
    const LABEL = 'picometer';
}

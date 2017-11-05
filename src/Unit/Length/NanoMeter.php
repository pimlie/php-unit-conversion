<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class NanoMeter extends Meter implements Metric
{
    const FACTOR = 1E-9;

    const SYMBOL = 'nm';
    const LABEL = 'nanometer';
}

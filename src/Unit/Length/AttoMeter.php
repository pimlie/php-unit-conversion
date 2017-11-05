<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class AttoMeter extends Meter implements Metric
{
    const FACTOR = 1E-18;

    const SYMBOL = 'am';
    const LABEL = 'attometer';
}

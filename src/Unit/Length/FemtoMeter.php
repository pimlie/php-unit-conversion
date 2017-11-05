<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class FemtoMeter extends Meter implements Metric
{
    const FACTOR = 1E-15;

    const SYMBOL = 'fm';
    const LABEL = 'femtometer';
}

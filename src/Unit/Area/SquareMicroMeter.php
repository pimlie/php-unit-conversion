<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareMicroMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-12;

    const SYMBOL = 'μm2';
    const LABEL = 'square micrometer';
}

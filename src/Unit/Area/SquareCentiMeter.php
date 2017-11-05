<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareCentiMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-4;

    const SYMBOL = 'cm2';
    const LABEL = 'square centimeter';
}

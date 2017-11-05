<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareMilliMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-6;

    const SYMBOL = 'mm2';
    const LABEL = 'square millimeter';
}

<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareDeciMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-2;

    const SYMBOL = 'dm2';
    const LABEL = 'square decimeter';
}

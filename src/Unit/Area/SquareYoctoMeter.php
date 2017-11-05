<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareYoctoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-48;

    const SYMBOL = 'ym2';
    const LABEL = 'square yoctometer';
}

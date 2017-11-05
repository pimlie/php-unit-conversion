<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareHectoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E4;

    const SYMBOL = 'hm2';
    const LABEL = 'square hectometer';
}

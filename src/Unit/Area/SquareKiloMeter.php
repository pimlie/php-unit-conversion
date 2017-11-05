<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareKiloMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E6;

    const SYMBOL = 'km2';
    const LABEL = 'square kilometer';
}

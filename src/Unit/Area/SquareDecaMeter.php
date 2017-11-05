<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareDecaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E2;

    const SYMBOL = 'dam2';
    const LABEL = 'square decameter';
}

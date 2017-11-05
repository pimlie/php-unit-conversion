<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareYottaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E48;

    const SYMBOL = 'Ym2';
    const LABEL = 'square yottameter';
}

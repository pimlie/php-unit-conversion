<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareExaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E36;

    const SYMBOL = 'Em2';
    const LABEL = 'square exameter';
}

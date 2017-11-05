<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareNanoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-18;

    const SYMBOL = 'nm2';
    const LABEL = 'square nanometer';
}

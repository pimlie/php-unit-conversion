<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareAttoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-36;

    const SYMBOL = 'am2';
    const LABEL = 'square attometer';
}

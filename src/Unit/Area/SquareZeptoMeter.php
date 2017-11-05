<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareZeptoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-42;

    const SYMBOL = 'zm2';
    const LABEL = 'square zeptometer';
}

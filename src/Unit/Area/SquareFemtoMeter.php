<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareFemtoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-30;

    const SYMBOL = 'fm2';
    const LABEL = 'square femtometer';
}

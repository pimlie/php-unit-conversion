<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareTeraMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E24;

    const SYMBOL = 'Tm2';
    const LABEL = 'square terameter';
}

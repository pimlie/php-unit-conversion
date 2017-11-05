<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareGigaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E18;

    const SYMBOL = 'Gm2';
    const LABEL = 'square gigameter';
}

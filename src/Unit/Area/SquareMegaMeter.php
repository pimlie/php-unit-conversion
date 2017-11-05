<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareMegaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E12;

    const SYMBOL = 'Mm2';
    const LABEL = 'square megameter';
}

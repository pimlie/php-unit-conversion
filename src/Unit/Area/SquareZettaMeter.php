<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquareZettaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E42;

    const SYMBOL = 'Zm2';
    const LABEL = 'square zettameter';
}

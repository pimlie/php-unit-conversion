<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicYottaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E72;

    const SYMBOL = 'Ym3';
    const LABEL = 'cubic yottameter';
}

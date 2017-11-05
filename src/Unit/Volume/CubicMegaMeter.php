<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicMegaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E18;

    const SYMBOL = 'Mm3';
    const LABEL = 'cubic megameter';
}

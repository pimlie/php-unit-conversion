<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicGigaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E27;

    const SYMBOL = 'Gm3';
    const LABEL = 'cubic gigameter';
}

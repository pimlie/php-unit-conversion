<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicKiloMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E9;

    const SYMBOL = 'km3';
    const LABEL = 'cubic kilometer';
}

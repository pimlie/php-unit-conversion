<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicZettaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E63;

    const SYMBOL = 'Zm3';
    const LABEL = 'cubic zettameter';
}

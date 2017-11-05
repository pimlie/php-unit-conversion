<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicZeptoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-63;

    const SYMBOL = 'zm3';
    const LABEL = 'cubic zeptometer';
}

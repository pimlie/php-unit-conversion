<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicPicoMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E-36;

    const SYMBOL = 'pm3';
    const LABEL = 'cubic picometer';
}

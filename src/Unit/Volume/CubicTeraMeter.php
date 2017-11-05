<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicTeraMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E36;

    const SYMBOL = 'Tm3';
    const LABEL = 'cubic terameter';
}

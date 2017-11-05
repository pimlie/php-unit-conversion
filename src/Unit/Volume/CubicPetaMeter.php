<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;

class CubicPetaMeter extends CubicMeter implements Metric
{
    const FACTOR = 1E45;

    const SYMBOL = 'Pm3';
    const LABEL = 'cubic petameter';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class MegaPascal extends Pascal implements Metric
{
    const FACTOR = 1E6;

    const SYMBOL = 'MPa';
    const LABEL = 'megapascal';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class GigaPascal extends Pascal implements Metric
{
    const FACTOR = 1E9;

    const SYMBOL = 'GPa';
    const LABEL = 'gigapascal';
}

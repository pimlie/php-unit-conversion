<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class ExaPascal extends Pascal implements Metric
{
    const FACTOR = 1E18;

    const SYMBOL = 'EPa';
    const LABEL = 'exapascal';
}

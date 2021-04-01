<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class CentiPascal extends Pascal implements Metric
{
    const FACTOR = 1E-2;

    const SYMBOL = 'cPa';
    const LABEL = 'centipascal';
}

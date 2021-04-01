<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class PicoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-12;

    const SYMBOL = 'pPa';
    const LABEL = 'picopascal';
}

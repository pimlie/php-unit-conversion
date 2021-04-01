<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class FemtoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-15;

    const SYMBOL = 'fPa';
    const LABEL = 'femtopascal';
}

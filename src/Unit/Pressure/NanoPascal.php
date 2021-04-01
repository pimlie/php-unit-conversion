<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class NanoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-9;

    const SYMBOL = 'nPa';
    const LABEL = 'nanopascal';
}

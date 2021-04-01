<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class AttoPascal extends Pascal implements Metric
{
    const FACTOR = 1E-18;

    const SYMBOL = 'aPa';
    const LABEL = 'attopascal';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class ExaMeter extends Meter implements Metric
{
    const FACTOR = 1E18;

    const SYMBOL = 'Em';
    const LABEL = 'exameter';
}

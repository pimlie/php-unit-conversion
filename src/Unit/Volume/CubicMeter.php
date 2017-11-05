<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\Traits\BaseUnit;

class CubicMeter extends Volume implements Metric
{
    use BaseUnit;
    
    const FACTOR = 1;
    
    const SYMBOL = 'm3';
    const LABEL = 'cubic meter';
}

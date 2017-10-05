<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Traits\BaseUnit;

class Celsius extends Temperature implements Metric
{
    use BaseUnit;
    
    const SYMBOL = '°C';
    const LABEL = 'celsius';
}

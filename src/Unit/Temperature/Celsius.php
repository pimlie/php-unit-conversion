<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\Metric;

class Celsius extends Kelvin implements Metric
{
    const ADDITION_PRE = 273.15;
    
    const SYMBOL = '°C';
    const LABEL = 'celsius';
}

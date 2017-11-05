<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Area;
use PhpUnitConversion\Traits\BaseUnit;

class SquareMeter extends Area implements Metric
{
    use BaseUnit;
    
    const FACTOR = 1;

    const SYMBOL = 'm2';
    const LABEL = 'square meter';
}

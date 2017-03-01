<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Area;
use PhpUnitConversion\Traits\BaseUnit;

class SquareMeter extends Area implements Metric
{
    use BaseUnit;
    
    const FACTOR_POWER = 2;
    const SYMBOL = 'm2';
    const LABEL = 'square meter';
    
    public function getFactor()
    {
        if (static::class !== self::class) {
            return static::FACTOR * static::FACTOR;
        }

        return false;
    }
}
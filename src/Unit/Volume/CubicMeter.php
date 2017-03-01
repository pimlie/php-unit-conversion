<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\Traits\BaseUnit;

class CubicMeter extends Volume implements Metric
{
    use BaseUnit;
    
    const SYMBOL = 'm3';
    const LABEL = 'cubic meter';
    
    public function getFactor()
    {
        if (static::class !== self::class) {
            return static::FACTOR * static::FACTOR * static::FACTOR;
        }

        return false;
    }
}
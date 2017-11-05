<?php
namespace PhpUnitConversion\Traits;
    
trait BaseUnit
{
    protected function toBaseUnit()
    {
        if (static::class === self::class) {
            return $this;
        }
        return parent::toBaseUnit();
    }
}

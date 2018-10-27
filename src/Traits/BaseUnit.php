<?php
namespace PhpUnitConversion\Traits;

use PhpUnitConversion\Unit;

trait BaseUnit
{
    /**
     * @return $this|Unit
     */
    protected function toBaseUnit()
    {
        if (static::class === self::class) {
            return $this;
        }
        return parent::toBaseUnit();
    }
}

<?php
namespace PhpUnitConversion\Traits;
    
trait HasFactor
{
    public function getFactor()
    {
        return self::FACTOR;
    }

    public function getAddition()
    {
        if (defined('static::ADDITION')) {
            return self::ADDITION;
        }

        return false;
    }

    protected function fromBaseValue($value)
    {
        $value/= self::getFactor();
        
        $addition = self::getAddition();
        if ($addition !== false) {
            $value-= $addition;
        }

        return $value;
    }
    
    protected function toBaseValue()
    {
        $value = $this->value;
        $value*= self::getFactor();
        
        $addition = self::getAddition();
        if ($addition !== false) {
            $value+= $addition;
        }

        return $value;
    }
}
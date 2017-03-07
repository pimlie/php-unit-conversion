<?php
namespace PhpUnitConversion\Traits;
    
trait HasRelativeFactor
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

    protected function fromBaseValue($baseValue)
    {
        $value = parent::fromBaseValue($baseValue);
        $value*= self::getFactor();
        
        $addition = self::getAddition();
        if ($addition !== false) {
            $value+= $addition;
        }
        
        return $value;
    }
    
    protected function toBaseValue()
    {
        $baseValue = $this->value / self::getFactor();
        
        $addition = self::getAddition();
        if ($addition !== false) {
            $value-= $addition;
        }
        
        return parent::toBaseValue($baseValue);
    }
}
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
            $value-= $addition;
        }
        
        return $value;
    }
    
    protected function toBaseValue($value = null)
    {
        if($value === null) $value = $this->value;
        
        $addition = self::getAddition();
        if ($addition !== false) {
            $value+= $addition;
        }
        
        $baseValue = $value / self::getFactor();
        
        return parent::toBaseValue($baseValue);
    }
}
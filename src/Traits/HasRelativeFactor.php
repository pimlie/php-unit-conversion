<?php
namespace PhpUnitConversion\Traits;
    
trait HasRelativeFactor
{
    public function getFactor()
    {
        return self::FACTOR;
    }

    public function getAdditionPre()
    {
        if (defined('self::ADDITION_PRE')) {
            return self::ADDITION_PRE;
        }

        return false;
    }

    public function getAdditionPost()
    {
        if (defined('self::ADDITION_POST')) {
            return self::ADDITION_POST;
        }

        return false;
    }

    protected function fromBaseValue($baseValue)
    {
        $value = $baseValue;

        $addition = self::getAdditionPost();
        if ($addition !== false) {
            $value-= $addition;
        }

        $factor = self::getFactor();
        if ($factor !== false) {
            $value/= $factor;
        }

        $addition = self::getAdditionPre();
        if ($addition !== false) {
            $value-= $addition;
        }

        return parent::fromBaseValue($value);
    }

    protected function toBaseValue($value = null)
    {
        if ($value === null) {
            $value = $this->value;
        }

        $value = parent::toBaseValue($value);

        $addition = self::getAdditionPre();
        if ($addition !== false) {
            $value+= $addition;
        }

        $factor = self::getFactor();
        if ($factor !== false) {
            $value*= $factor;
        }

        $addition = self::getAdditionPost();
        if ($addition !== false) {
            $value+= $addition;
        }

        return $value;
    }
}

<?php
namespace PhpUnitConversion\Traits;
    
trait HasFactor
{
    /**
     * @return float
     */
    public function getFactor()
    {
        return self::FACTOR;
    }

    /**
     * @return float|bool
     */
    public function getAdditionPre()
    {
        if (defined('self::ADDITION_PRE')) {
            return self::ADDITION_PRE;
        }

        return false;
    }

    /**
     * @return float|bool
     */
    public function getAdditionPost()
    {
        if (defined('self::ADDITION_POST')) {
            return self::ADDITION_POST;
        }

        return false;
    }

    /**
     * @param float $baseValue
     * @return float
     */
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

        return $value;
    }

    /**
     * @param float|null $value
     * @return float|null
     */
    protected function toBaseValue($value = null)
    {
        if ($value === null) {
            $value = $this->value;
        }

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

<?php
namespace PhpUnitConversion;

use InvalidArgumentException;
use PhpUnitConversion\Exception\UnsupportedUnitException;
use PhpUnitConversion\Exception\UnsupportedConversionException;

class Unit
{
    const TYPE_MASS = 1;
    const TYPE_LENGTH = 2;
    const TYPE_AREA = 3;
    const TYPE_VOLUME = 4;
    const TYPE_TIME = 5;
    
    protected $value;
    
    static protected $symbolMap;
    
    public function __construct($value = null, $convertFromBaseUnit = false)
    {
        if ($value !== null) {
            $this->setValue($value, $convertFromBaseUnit);
        }
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setValue($value, $convertFromBaseUnit = false)
    {
        if ($convertFromBaseUnit) {
            $this->value = $this->fromBaseValue($value);
        } else {
            $this->value = $value;
        }
    }

    public function getFactor()
    {
        if (defined('static::FACTOR')) {
            return static::FACTOR;
        }
        return false;
    }
    
    public function getAddition()
    {
        if (defined('static::ADDITION')) {
            return static::ADDITION;
        }

        return false;
    }

    public function getSymbol()
    {
        $symbol = '';
        if (defined('static::SYMBOL') && !empty(static::SYMBOL)) {
            if ($this instanceof \PhpUnitConversion\Prefix) {
                $symbol = static::PREFIX_SYMBOL . static::SYMBOL;
            } else {
                $symbol = static::SYMBOL;
            }
        }
        return $symbol;
    }
    
    protected function fromBaseValue($baseValue)
    {
        $value = $baseValue;

        $factor = $this->getFactor();

        if ($factor !== false) {
            $value/= $factor;
        }

        $addition = $this->getAddition();
        if ($addition !== false) {
            $value-= $addition;
        }

        return $value;
    }
    
    protected function toBaseValue($value)
    {
        $baseValue = $value;

        $factor = $this->getFactor();
        if ($factor !== false) {
            $baseValue*= $factor;
        }

        $addition = $this->getAddition();
        if ($addition !== false) {
            $baseValue+= $addition;
        }

        return $baseValue;
    }
    
    protected function toBaseUnit()
    {
        $baseUnitClass = static::BASE_UNIT;
        
        return new $baseUnitClass($this->toBaseValue($this->getValue()));
    }
    
    protected static function createFromBaseUnit(Unit $unit)
    {
        $baseUnitClass = static::BASE_UNIT;

        if ($unit instanceof $baseUnitClass) {
            return new static($unit->getValue(), true);
        }
    }
    
    public static function from($value)
    {
        $classType = gettype($value);
        
        if ($classType === 'string' && !class_exists($classType)) {
            $symbolMap = static::buildSymbolMap();

            foreach ($symbolMap As $type => $typeSymbols) {
                // If this method is not called from the Unit class,
                // then skip all other unit types
                if (static::class !== self::class && static::TYPE !== $type) {
                    continue;
                }

                foreach ($typeSymbols As $symbol => $class) {
                    $len = strlen($symbol) + 1;

                    if (substr_compare($value, ' '.$symbol, -$len, $len) === 0) {
                        return new $class(substr($value, 0, -$len));
                    }
                }
            }

            throw new InvalidArgumentException();
        } else if ($classType === 'string' || $classType === 'object') {
            // If classType is string, initiate a default value of 1
            if ($classType === 'string') {
                $value = new $value(1);
            }

            if (static::TYPE !== $value::TYPE ) {
                throw new UnsupportedConversionException([static::TYPE, $value::TYPE]);
            } else {
                if (get_class($value) === static::BASE_UNIT) {
                    $baseUnit = $value;
                } else {
                    $baseUnit = $value->toBaseUnit();    
                }
                
                if ($baseUnit instanceof static) {
                    return $baseUnit;
                }
                
                return self::createFromBaseUnit($baseUnit);
            }
        }
    }
    
    public function to($unitClass)
    {
        if (static::class === static::BASE_UNIT) {
            $baseUnit = $this;
        } else {
            $baseUnit = $this->toBaseUnit();    
        }
        
        $classType = gettype($unitClass);

        if ($classType === 'string') {
            if (!class_exists($unitClass)) {
                throw new InvalidArgumentException();
            } else {
                return $unitClass::createFromBaseUnit($baseUnit);
            }
        } else if ($classType === 'object') {
            if (static::TYPE !== $unitClass::TYPE ) {
                throw new UnsupportedConversionException([static::TYPE, $unitClass::TYPE]);
            } else {
                $unitClass->setValue($baseUnit->getValue(), true);
                return $unitClass;
            }
        }
        return false;
    }
    
    public function add()
    {
        $numArgs = func_num_args();
        if (!$numArgs) {
            throw new InvalidArgumentException('add expects at least one Unit argument');
        }
        
        $value = $this->toBaseValue($this->getValue());
        
        $args = func_get_args();
        for ($i = 0; $i < $numArgs; $i++) {
            if (!($args[$i] instanceof Unit)) {
                throw new InvalidArgumentException();
            }

            if (static::TYPE !== $args[$i]::TYPE ) {
                throw new UnsupportedUnitException([$args[$i]::TYPE]);
            }

            $value+= $args[$i]->toBaseUnit()->getValue();
        }
        
        $baseUnitClass = static::BASE_UNIT;
        return self::createFromBaseUnit(new $baseUnitClass($value));
    }

    public function substract()
    {
        $numArgs = func_num_args();
        if (!$numArgs) {
            throw new InvalidArgumentException('substract expects at least one Unit argument');
        }
        
        $value = $this->toBaseUnit()->getValue();
        
        $args = func_get_args();
        for ($i = 0; $i < $numArgs; $i++) {
            if (!($args[$i] instanceof Unit)) {
                throw new InvalidArgumentException();
            }

            if (static::TYPE !== $args[$i]::TYPE ) {
                throw new UnsupportedUnitException([$args[$i]::TYPE]);
            }
            
            $value-= $args[$i]->toBaseUnit()->getValue();
        }
        
        $baseUnitClass = static::BASE_UNIT;
        return self::createFromBaseUnit(new $baseUnitClass($value));
    }

    private static function _buildSymbolMap($rebuild = false)
    {
        if (!$rebuild && isset(static::$symbolMap)) {
            return static::$symbolMap;
        }
        
        static::$symbolMap = [];
        foreach (glob(__DIR__ .'/Unit/*/*.php') As $unitFile) {
            $unitClass = __NAMESPACE__ . str_replace(array(__DIR__, '.php', '/'), array('', '', '\\'), $unitFile);

            if (class_exists($unitClass)) {
                $unitObject = new $unitClass;
                
                if (!isset(static::$symbolMap[$unitObject::TYPE])) {
                    static::$symbolMap[$unitObject::TYPE] = [];
                }

                $symbol = $unitObject->getSymbol();
                
                if (!empty($symbol)) {
                    static::$symbolMap[$unitObject::TYPE][$symbol] = $unitClass;
                }
            }
        }
        
        return static::$symbolMap;
    }
    
    public function format($precision = 3, $addSymbol = true)
    {
        $symbol = $this->getSymbol();
        
        if (!empty($symbol)) {
            $format = '%02.' . $precision . 'f %s';
            
            return sprintf($format, $this->getValue(), $symbol);
        } else {
            $format = '%02.' . $precision . 'f';
            
            return sprintf($format, $this->getValue());
        }
    }

    public function __toString()
    {
        return (string)$this->getValue();
    }
}
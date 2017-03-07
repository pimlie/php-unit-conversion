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

    static protected $typeMap;
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
    
    protected function toBaseValue()
    {
        $baseValue = $this->value;

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
        
        return new $baseUnitClass($this->toBaseValue());
    }
    
    protected static function createFromBaseUnit(Unit $unit)
    {
        $baseUnitClass = static::BASE_UNIT;

        if ($unit instanceof $baseUnitClass) {
            return new static($unit->getValue(), true);
        }
    }
    
    /**
     * Convert from/create a new Unit object for the supplied value
     * 
     * Supplied value can either be:
     * - an integer or double, in which case the value should contain the TYPE of the value
     * - a unit class name (string), in which case the value to convert from will be set to 1
     * - an Unit instance, in which case the value from the instance will be used
     * - an string of the unit value with a symbol, eg '12 g' for 12 grams
     *
     * @param mixed $value Either an integer, double, string or object
     *
     * @return Unit Returns a new Unit instance on success or throws an Exception
     */
    public static function from($value)
    {
        $classType = gettype($value);
        
        if ($classType === 'integer' || $classType === 'double') {
            $type = $value & 63;
            $value = $value >> 6;
            
            $typeMap = static::_buildTypeMap();
            
            if(isset($typeMap[$type])) {
                $baseClass = $typeMap[$type]::BASE_UNIT;
                
                return new $baseClass($value);
            }
            
            throw new InvalidArgumentException();
        }else if ($classType === 'string' && !class_exists($classType)) {
            $symbolMap = static::_buildSymbolMap();

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
                $baseUnit = $value->toBaseUnit();    
                
                if ($baseUnit instanceof static) {
                    return $baseUnit;
                }
                
                return self::createFromBaseUnit($baseUnit);
            }
        }
    }
    
    /**
     * Convert the current Unit instance to a new one
     *
     * Returns a new $unitClass instance set to the value that is equal to the value of the current Unit instance
     *
     * @param mixed $unitClass An Unit class name or object
     *
     * @return A new Unit instance as defined by $unitClass set to the value of the current Unit
     */
    public function to($unitClass)
    {
        $baseUnit = $this->toBaseUnit();    
        
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
        
        $value = $this->toBaseValue();
        
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

    private static function _buildTypeMap($rebuild = false)
    {
        if (!$rebuild && isset(static::$typeMap)) {
            return static::$typeMap;
        }
        
        static::$typeMap = [];
        foreach (glob(__DIR__.'/Unit/*.php') As $unitFile) {
            $unitClass = __NAMESPACE__ . str_replace(array(__DIR__, '.php', '/'), array('', '', '\\'), $unitFile);
            
            if (class_exists($unitClass)) {
                static::$typeMap[$unitClass::TYPE] =$unitClass;
            }
        }

        return static::$typeMap;
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

    public function __invoke()
    {
        return ($this->toBaseValue() << 6) + static::TYPE;
    }

    public function __toString()
    {
        $symbol = $this->getSymbol();
        return (string)$this->getValue() . ($symbol ? ' ' . $symbol : '');
    }
}
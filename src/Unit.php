<?php
namespace PhpUnitConversion;

use InvalidArgumentException;
use PhpUnitConversion\System;
use PhpUnitConversion\Exception\InvocationException;
use PhpUnitConversion\Exception\UnsupportedUnitException;
use PhpUnitConversion\Exception\UnsupportedConversionException;

class Unit
{
    protected $value;

    static protected $typeMap;
    static protected $factorMap;
    static protected $symbolMap;
    static protected $labelMap;

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

    public function getLabel()
    {
        $label = '';
        if (defined('static::LABEL') && !empty(static::LABEL)) {
            if ($this instanceof \PhpUnitConversion\Prefix) {
                $label = static::PREFIX_LABEL . static::LABEL;
            } else {
                $label = static::LABEL;
            }
        }
        return $label;
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
    
    protected function toBaseValue($value = null)
    {
        if($value === null) $value = $this->value;

        $factor = $this->getFactor();
        if ($factor !== false) {
            $value*= $factor;
        }

        $addition = $this->getAddition();
        if ($addition !== false) {
            $value+= $addition;
        }

        return $value;
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
            $intValue = (int)$value;
            $type = $intValue & 63;
            $value = ($intValue >> 6) + ($value - $intValue);
            
            $typeMap = static::_buildTypeMap();
            
            if(isset($typeMap[$type])) {
                $baseClass = $typeMap[$type]::BASE_UNIT;
                
                return new $baseClass($value);
            }
            
            throw new InvalidArgumentException();
        }else if ($classType === 'string' && !class_exists($classType)) {
            // make use of php's type juggling to find symbol
            $numberPart = (float)$value;
            $symbolPart = trim(str_replace($numberPart, '', $value));

            $symbolMap = static::_buildSymbolMap();
            foreach ($symbolMap As $type => $typeSymbols) {
                // If this method is not called from the Unit class,
                // then skip all other unit types
                if (static::class !== self::class && static::TYPE !== $type) {
                    continue;
                }

                // make use of php's type juggling to find symbol
                $numberPart = (float)$value;
                $symbolPart = trim(str_replace($numberPart, '', $value));
                foreach ($typeSymbols As $symbol => $class) {
                    if ($symbolPart === $symbol) {
                        return new $class($numberPart);
                    }
                }
            }

            $labelMap = static::_buildLabelMap();
            foreach ($labelMap As $type => $typeLabels) {
                // If this method is not called from the Unit class,
                // then skip all other unit types
                if (static::class !== self::class && static::TYPE !== $type) {
                    continue;
                }

                foreach ($typeLabels As $label => $class) {
                    if ($symbolPart === $label) {
                        return new $class($numberPart);
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
    
    /**
     * Finds the nearest unit to a given value
     *
     * Returns a new $unitClass instance which is euqal to the given value 
     * but with a value closest to 1
     *
     * @param mixed $value An integer, double or Unit object
     *
     * @return Returns an Unit object 
     */
    public static function nearest($value, $system = null)
    {
        if (self::class === static::class) {
            throw new InvocationException([self::class]);
        }

        $factorMap = static::_buildFactorMap();
        
        $classType = gettype($value);
        
        if ($classType === 'integer' || $classType === 'double') {
            $baseValue = $value;
        } else if ($classType === 'object' && $value instanceof Unit) {
            $baseValue = $value->toBaseValue();
        } else {
            throw new InvalidArgumentException('$value should be an integer, double or instance of Unit');
        }

        if (is_array($factorMap[static::TYPE])) {
            foreach ($factorMap[static::TYPE] As $unitClass => $unitBaseValue) {
                if ($system === null || (new $unitClass) instanceof $system) {
                    if ($baseValue < 0.9 * $unitBaseValue) {
                        if (!isset($lastUnitClass)) $lastUnitClass = $unitClass;
                        
                        if ($classType === 'object' && $classType instanceof Unit) {
                            return $value->to($lastUnitClass);
                        } else {
                            $unitObject = new $lastUnitClass;
                            $baseClass = $unitObject::BASE_UNIT;
                            
                            return (new $baseClass($baseValue))->to($unitObject);
                        }
                    }

                    $lastUnitClass = $unitClass;
                }
            }
        }
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
        if ($rebuild || !isset(static::$typeMap)) {
            static::$typeMap = [];
            foreach (glob(__DIR__.'/Unit/*.php') As $unitFile) {
                $unitClass = __NAMESPACE__ . str_replace(array(__DIR__, '.php', '/'), array('', '', '\\'), $unitFile);
                
                if (class_exists($unitClass)) {
                    static::$typeMap[$unitClass::TYPE] = $unitClass;
                }
            }
        }

        return static::$typeMap;
    }


    private static function _buildFactorMap($rebuild = false)
    {
        if ($rebuild || !isset(static::$factorMap)) {
            static::$factorMap = [];
            
            foreach (glob(__DIR__ .'/Unit/*/*.php') As $unitFile) {
                $unitClass = __NAMESPACE__ . str_replace(array(__DIR__, '.php', '/'), array('', '', '\\'), $unitFile);
    
                if (class_exists($unitClass)) {
                    $unitObject = new $unitClass(1);
                    
                    if (!isset(static::$factorMap[$unitObject::TYPE])) {
                        static::$factorMap[$unitObject::TYPE] = [];
                    }

                    static::$factorMap[$unitObject::TYPE][$unitClass] = $unitObject->toBaseValue();
                }
            }

            foreach (static::$factorMap As $unitType => $values) {
                asort(static::$factorMap[$unitType]);
            }
        }

        return static::$factorMap;
    }

    private static function _buildSymbolMap($rebuild = false)
    {
        if ($rebuild || !isset(static::$symbolMap)) {
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
        }

        return static::$symbolMap;
    }

    private static function _buildLabelMap($rebuild = false)
    {
        if ($rebuild || !isset(static::$labelMap)) {
            static::$labelMap = [];
            foreach (glob(__DIR__ .'/Unit/*/*.php') As $unitFile) {
                $unitClass = __NAMESPACE__ . str_replace(array(__DIR__, '.php', '/'), array('', '', '\\'), $unitFile);

                if (class_exists($unitClass)) {
                    $unitObject = new $unitClass;

                    if (!isset(static::$labelMap[$unitObject::TYPE])) {
                        static::$labelMap[$unitObject::TYPE] = [];
                    }

                    $label = $unitObject->getLabel();

                    if (!empty($label)) {
                        static::$labelMap[$unitObject::TYPE][$label] = $unitClass;
                    }
                }
            }
        }

        return static::$labelMap;
    }

    public function __invoke()
    {
        $intBase = (int)$this->toBaseValue();
        return ($intBase << 6) + static::TYPE + ($this->toBaseValue() - $intBase);
    }

    public function __toString()
    {
        $symbol = $this->getSymbol();
        return (string)$this->getValue() . ($symbol ? ' ' . $symbol : '');
    }
}

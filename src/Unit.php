<?php
namespace PhpUnitConversion;

use InvalidArgumentException;
use PhpUnitConversion\Exception\InvocationException;
use PhpUnitConversion\Exception\UnsupportedUnitException;
use PhpUnitConversion\Exception\UnsupportedConversionException;

class Unit
{
    /** @var float */
    protected $value;

    /** @var int */
    static protected $bitShift = 6;

    /**
     * @param float $value
     * @param bool $convertFromBaseUnit
     */
    public function __construct($value = null, $convertFromBaseUnit = false)
    {
        if ($value !== null) {
            $this->setValue($value, $convertFromBaseUnit);
        }
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @param bool $convertFromBaseUnit
     */
    public function setValue($value, $convertFromBaseUnit = false)
    {
        if ($convertFromBaseUnit) {
            $this->value = $this->fromBaseValue($value);
        } else {
            $this->value = $value;
        }
    }

    /**
     * @return string|bool
     */
    public function getFactor()
    {
        if (defined('static::FACTOR')) {
            return static::FACTOR;
        }
        return false;
    }

    /**
     * @return string|bool
     */
    public function getAdditionPre()
    {
        if (defined('static::ADDITION_PRE')) {
            return static::ADDITION_PRE;
        }

        return false;
    }

    /**
     * @return string|bool
     */
    public function getAdditionPost()
    {
        if (defined('static::ADDITION_POST')) {
            return static::ADDITION_POST;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        $symbol = '';
        if (defined('static::SYMBOL') && !empty(static::SYMBOL)) {
            $symbol = static::SYMBOL;
        }
        return $symbol;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        $label = '';
        if (defined('static::LABEL') && !empty(static::LABEL)) {
            $label = static::LABEL;
        }
        return $label;
    }

    /**
     * @param float $baseValue
     * @return bool|float
     */
    protected function fromBaseValue($baseValue)
    {
        $value = $baseValue;

        $addition = $this->getAdditionPost();
        if ($addition !== false) {
            $value-= $addition;
        }

        $factor = $this->getFactor();
        if ($factor !== false) {
            $value/= $factor;
        }

        $addition = $this->getAdditionPre();
        if ($addition !== false) {
            $value-= $addition;
        }

        return $value;
    }

    /**
     * @param float $value
     * @return float
     */
    protected function toBaseValue($value = null)
    {
        if ($value === null) {
            $value = $this->value;
        }

        $addition = $this->getAdditionPre();
        if ($addition !== false) {
            $value+= $addition;
        }

        $factor = $this->getFactor();
        if ($factor !== false) {
            $value*= $factor;
        }

        $addition = $this->getAdditionPost();
        if ($addition !== false) {
            $value+= $addition;
        }

        return $value;
    }

    /**
     * @return Unit
     */
    protected function toBaseUnit()
    {
        $baseUnitClass = static::BASE_UNIT;

        return new $baseUnitClass($this->toBaseValue());
    }

    /**
     * @param Unit $unit
     * @return Unit|null
     */
    protected static function createFromBaseUnit(Unit $unit)
    {
        $baseUnitClass = static::BASE_UNIT;

        if ($unit instanceof $baseUnitClass) {
            return new static($unit->getValue(), true);
        }
    }

    /**
     * Convert from/create a new Unit instance for the supplied value
     *
     * Supplied value can either be:
     * - an integer or float, in which case the value should contain the TYPE of the value
     * - a Unit class name (string), in which case the value to convert from will be set to 1
     * - a Unit instance, in which case the value from the instance will be used
     * - a string of the unit value with a symbol, eg '12 g' for 12 grams
     *
     * @param int|float|string|Unit $value Either an integer, float, string or Unit instance
     *
     * @return Unit Returns a new Unit instance on success or throws an Exception
     * @throws UnsupportedConversionException
     */
    public static function from($value)
    {
        $classType = gettype($value);

        if ($classType === 'integer' || $classType === 'double') {
            $intValue = (int)$value;
            $type = $intValue & ((1 << self::$bitShift) - 1);
            $value = ($intValue >> self::$bitShift) + ($value - $intValue);

            $typeMap = static::getBaseUnits();
            
            if (isset($typeMap[$type])) {
                $baseClass = $typeMap[$type]::BASE_UNIT;

                return new $baseClass($value);
            }

            throw new InvalidArgumentException();
        } elseif ($classType === 'string' && !class_exists($value)) {
            // make use of php's type juggling to find symbol
            $numberPart = (float)$value;
            $symbolPart = trim(str_replace($numberPart, '', $value));

            $symbolMap = static::getSymbolMap();
            foreach ($symbolMap as $type => $typeSymbols) {
                // If this method is not called from the Unit class,
                // then skip all other unit types
                if (static::class !== self::class && static::TYPE !== $type) {
                    continue;
                }

                // make use of php's type juggling to find symbol
                $numberPart = (float)$value;
                $symbolPart = trim(str_replace($numberPart, '', $value));
                foreach ($typeSymbols as $symbol => $class) {
                    if ($symbolPart === $symbol) {
                        return new $class($numberPart);
                    }
                }
            }

            $labelMap = static::getLabelMap();
            foreach ($labelMap as $type => $typeLabels) {
                // If this method is not called from the Unit class,
                // then skip all other unit types
                if (static::class !== self::class && static::TYPE !== $type) {
                    continue;
                }

                foreach ($typeLabels as $label => $class) {
                    if ($symbolPart === $label) {
                        return new $class($numberPart);
                    }
                }
            }

            throw new InvalidArgumentException();
        } elseif ($classType === 'string' || $classType === 'object') {
            // If classType is string, initiate a default value of 1
            if ($classType === 'string') {
                $value = new $value(1);
            }

            if (static::TYPE !== $value::TYPE) {
                throw new UnsupportedConversionException([static::TYPE, $value::TYPE]);
            } else {
                $baseUnit = $value->toBaseUnit();

                if ($baseUnit instanceof static) {
                    return $baseUnit;
                }

                return self::createFromBaseUnit($baseUnit);
            }
        } else {
            throw new UnsupportedConversionException();
        }
    }

    /**
     * Convert the current Unit instance to a new one
     *
     * Returns a new $unitClass instance set to the value that is equal to the value of the current Unit instance
     *
     * @param mixed $unitClass A Unit class name or instance
     *
     * @return Unit|bool A new Unit instance as defined by $unitClass set to the value of the current Unit
     * @throws UnsupportedConversionException
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
        } elseif ($classType === 'object') {
            if (static::TYPE !== $unitClass::TYPE) {
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
     * Returns a new $unitClass instance which is equal to the given value
     * but with a value closest to 1
     *
     * @param int|float|Unit $value An integer, float or Unit instance
     * @param string|null $system A System class name
     *
     * @return Unit|bool Returns a Unit instance
     * @throws InvocationException
     * @throws UnsupportedConversionException
     */
    public static function nearest($value, $system = null)
    {
        if (self::class === static::class) {
            throw new InvocationException([self::class]);
        }

        $factorMap = static::getFactorMap();
        
        $classType = gettype($value);

        if ($classType === 'integer' || $classType === 'double') {
            $baseValue = $value;
        } elseif ($classType === 'object' && $value instanceof Unit) {
            $baseValue = $value->toBaseValue();
        } else {
            throw new InvalidArgumentException('$value should be an integer, float or Unit instance');
        }

        if (is_array($factorMap[static::TYPE])) {
            foreach ($factorMap[static::TYPE] as $unitClass => $unitBaseValue) {
                if ($system === null || (new $unitClass) instanceof $system) {
                    if ($baseValue < 0.9 * $unitBaseValue) {
                        if (!isset($lastUnitClass)) {
                            $lastUnitClass = $unitClass;
                        }

                        if ($classType === 'object' && $value instanceof Unit) {
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

        throw new UnsupportedConversionException();
    }

    /**
     * @param Unit|int|float $args
     * @return null|Unit
     * @throws UnsupportedUnitException
     */
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

            if (static::TYPE !== $args[$i]::TYPE) {
                throw new UnsupportedUnitException([$args[$i]::TYPE]);
            }

            $value+= $args[$i]->toBaseUnit()->getValue();
        }

        $baseUnitClass = static::BASE_UNIT;
        return self::createFromBaseUnit(new $baseUnitClass($value));
    }

    /**
     * @param Unit|int|float $args
     * @return null|Unit
     * @throws UnsupportedUnitException
     */
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

            if (static::TYPE !== $args[$i]::TYPE) {
                throw new UnsupportedUnitException([$args[$i]::TYPE]);
            }

            $value-= $args[$i]->toBaseUnit()->getValue();
        }

        $baseUnitClass = static::BASE_UNIT;
        return self::createFromBaseUnit(new $baseUnitClass($value));
    }

    /**
     * @param int $precision
     * @param bool $addSymbol
     * @return string
     */
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

    /**
     * @return string[]
     */
    public static function getBaseUnits()
    {
        static $typeMap = [];

        if (empty($typeMap)) {
            $typeRegistry = new TypeRegistry();
            $typeRegistry->loadDirectory(__DIR__ . '/Unit/', __NAMESPACE__ . '\\Unit\\', '*.php');
            $types = array_filter($typeRegistry->getTypes(), function ($type) {
                return is_a($type, Unit::class, true);
            });

            foreach ($types as $type) {
                /** @var Unit $typeObject */
                $typeObject = new $type();
                $typeMap[$typeObject::TYPE] = $typeObject;
            }
        }

        return $typeMap;
    }

    /**
     * @return array
     */
    private static function getFactorMap()
    {
        static $factorMap = [];

        if (empty($factorMap)) {
            foreach (self::getUnitTypes() as $type) {
                /** @var Unit $unitObject */
                $unitObject = new $type(1);

                if (!array_key_exists($unitObject::TYPE, $factorMap)) {
                    $factorMap[$unitObject::TYPE] = [];
                }

                $factorMap[$unitObject::TYPE][$type] = $unitObject->toBaseValue();
            }

            foreach ($factorMap as &$factors) {
                asort($factors);
            }
        }

        return $factorMap;
    }

    /**
     * @return array
     */
    private static function getSymbolMap()
    {
        static $symbolMap = [];

        if (empty($symbolMap)) {
            foreach (self::getUnitTypes() as $type) {
                /** @var Unit $unitObject */
                $unitObject = new $type();

                if (!array_key_exists($unitObject::TYPE, $symbolMap)) {
                    $symbolMap[$unitObject::TYPE] = [];
                }

                if (!empty($unitObject->getSymbol())) {
                    $symbolMap[$unitObject::TYPE][$unitObject->getSymbol()] = $unitObject;
                }
            }
        }

        return $symbolMap;
    }

    /**
     * @return array[]
     */
    private static function getLabelMap()
    {
        static $labelMap = [];

        if (empty($labelMap)) {
            foreach (self::getUnitTypes() as $type) {
                /** @var Unit $unitObject */
                $unitObject = new $type();

                if (!array_key_exists($unitObject::TYPE, $labelMap)) {
                    $labelMap[$unitObject::TYPE] = [];
                }

                if (!empty($unitObject->getLabel())) {
                    $labelMap[$unitObject::TYPE][$unitObject->getLabel()] = $unitObject;
                }
            }
        }

        return $labelMap;
    }

    /**
     * @return string[]
     */
    public static function getUnitTypes()
    {
        static $unitTypes = [];

        if (empty($unitTypes)) {
            $typeRegistry = new TypeRegistry();
            $typeRegistry->loadDirectory(__DIR__ . '/Unit/', __NAMESPACE__ . '\\Unit\\', '*/*.php');
            $unitTypes = array_filter($typeRegistry->getTypes(), function ($type) {
                return is_a($type, Unit::class, true);
            });
        }

        return $unitTypes;
    }

    /**
     * @return float|int
     */
    public function __invoke()
    {
        $intBase = (int)$this->toBaseValue();
        return ($intBase << self::$bitShift) + static::TYPE + ($this->toBaseValue() - $intBase);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $symbol = $this->getSymbol();
        return (string)$this->getValue() . ($symbol ? ' ' . $symbol : '');
    }
}

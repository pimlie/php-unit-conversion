<?php
namespace PhpUnitConversion\Map;

use PhpUnitConversion\Map;

abstract class Factor extends Map
{
    /**
     * @return array
     */
    public static function get()
    {
        $factors = &static::value('factor');

        if (static::load() || empty($factors)) {
            $factors = [];

            foreach (static::$map as $unitType => $units) {
                foreach ($units as $unitClass) {
                    if (class_exists($unitClass)) {
                        if (!array_key_exists($unitClass::TYPE, $factors)) {
                            $factors[$unitClass::TYPE] = [];
                        }

                        /** @var Unit $unitObject */
                        $unitObject = new $unitClass(1);
                        $factors[$unitClass::TYPE][$unitClass] = $unitObject->to($unitClass::BASE_UNIT)->getValue();
                    }
                }
            }

            foreach ($factors as &$unitFactors) {
                asort($unitFactors);
            }
        }

        return $factors;
    }

    /**
     * @return array
     */
    public static function byType($type)
    {
        $factors = static::get();
        return $factors[$type];
    }
}

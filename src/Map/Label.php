<?php
namespace PhpUnitConversion\Map;

use PhpUnitConversion\Map;

abstract class Label extends Map
{
    /**
     * @return array
     */
    public static function get()
    {
        $labels = &static::value('label');

        if (static::load() || empty($labels)) {
            $labels = [];

            foreach (static::$map as $unitType => $units) {
                foreach ($units as $unitClass) {
                    if (!array_key_exists($unitClass::TYPE, $labels)) {
                        $labels[$unitClass::TYPE] = [];
                    }

                    if (!empty($unitClass::LABEL)) {
                        $labels[$unitClass::TYPE][$unitClass::LABEL] = $unitClass;
                    }
                }
            }
        }

        return $labels;
    }
}

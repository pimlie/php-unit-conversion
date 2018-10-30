<?php
namespace PhpUnitConversion\Map;

use PhpUnitConversion\Map;

abstract class Type extends Map
{
    /**
     * @return array
     */
    public static function get()
    {
        $types = &static::value('type');

        if (static::load() || empty($types)) {
            $types = [];

            foreach (array_keys(static::$map) as $unitTypeClass) {
                if (class_exists($unitTypeClass)) {
                    $types[$unitTypeClass::TYPE] = $unitTypeClass;
                }
            }
        }

        return $types;
    }

    /**
     * @return string
     */
    public static function byType($type)
    {
        $types = static::get();
        return $types[$type];
    }
}

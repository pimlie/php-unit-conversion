<?php
namespace PhpUnitConversion\Map;

use PhpUnitConversion\Map;

abstract class Unit extends Map
{
    /**
     * @return array
     */
    public static function get($type = null)
    {
        static $all = [];

        if (static::load() || empty($all)) {
            foreach (static::$map as $units) {
                $all = array_merge($all, $units);
            }
        }

        return $all;
    }

    /**
     * @return array
     */
    public static function byType($type)
    {
        static::load();

        foreach (static::$map as $unitTypeClass => $units) {
            if ($unitTypeClass::TYPE === $type) {
                return $units;
            }
        }

        return false;
    }
}

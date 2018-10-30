<?php
namespace PhpUnitConversion\Map;

use PhpUnitConversion\Map;

abstract class Symbol extends Map
{
    /**
     * @return array
     */
    public static function get()
    {
        $symbols = &static::value('symbol');

        if (static::load() || empty($symbols)) {
            $symbols = [];

            foreach (static::$map as $unitType => $units) {
                foreach ($units as $unitClass) {
                    if (!array_key_exists($unitClass::TYPE, $symbols)) {
                        $symbols[$unitClass::TYPE] = [];
                    }

                    if (!empty($unitClass::SYMBOL)) {
                        $symbols[$unitClass::TYPE][$unitClass::SYMBOL] = $unitClass;
                    }
                }
            }
        }

        return $symbols;
    }
}

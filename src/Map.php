<?php
namespace PhpUnitConversion;

use PhpUnitConversion;

abstract class Map
{
    const PHP_EXTENSION = '.php';

     /** @var array */
    protected static $paths = [[__DIR__ . '/Unit/', __NAMESPACE__ . '\\Unit', false, null]];

     /** @var array */
    protected static $map = [];

     /** @var array */
    protected static $values = [];

    /**
     * @param string $mapType
     * @return array
     */
    protected static function &value($mapType)
    {
        return static::$values[$mapType];
    }

    /**
     * @param string $path
     * @param string $namespace
     * @param string $unitType
     * @return void
     */
    public static function add($path, $namespace = '', $unitType = '')
    {
        self::$paths[] = [$path, $namespace, false, $unitType];
    }

    /**
     * @return void
     */
    public static function resetValues()
    {
        self::$values = [];
    }

    /**
     * @return void
     */
    public static function reset()
    {
        self::$map = [];
        self::resetValues();
    }

    /**
     * @return void
     */
    public static function clear()
    {
        self::reset();
        self::$paths = [];
    }

    /**
     * @return boolean
     */
    public static function load()
    {
        $newlyLoaded = false;
        foreach (self::$paths as $k => list($path, $namespace, $loaded, $unitType)) {
            if (!$loaded) {
                if (self::loadPath($path, $namespace, $unitType)) {
                    self::$paths[$k][2] = true;
                    $newlyLoaded = true;

                    self::resetValues();
                }
            }
        }
        return $newlyLoaded;
    }

    /**
     * @param string $path
     * @param string $namespace
     * @return string
     */
    protected static function loadPath($path, $namespace = '', $unitType = '')
    {
        if (is_file($path)) {
            $classes = self::loadFile($path, $namespace);

            if (!is_array($classes)) {
                $classes = [$unitType => [$classes]];
            }
        } elseif (is_dir($path)) {
            $classes = self::loadDirectory($path, $namespace);
        }

        self::$map = self::$map + $classes;

        return count($classes) > 0;
    }

    /**
     * @param string $directory
     * @param string $namespace
     * @return array
     */
    protected static function loadDirectory($directory, $namespace = '')
    {
        $classes = [];
        foreach (glob($directory . '/*' . self::PHP_EXTENSION) as $file) {
            $className = self::loadFile($file, $namespace, $directory);

            if (is_array($className)) {
                $classes = $classes + $className;
            } elseif (is_string($className)) {
                $classes[] = $className;
            }
        }
        return $classes;
    }

    /**
     * @param string $file
     * @param string $namespace
     * @return string|array
     */
    protected static function loadFile($file, $namespace = '')
    {
        if (file_exists($file)) {
            $fileName = basename($file, self::PHP_EXTENSION);
            $className = rtrim($namespace, '\\') . '\\' . $fileName;

            if (class_exists($className) && is_a($className, Unit::class, true)) {
                $directory = substr($file, 0, -1 * strlen(self::PHP_EXTENSION));
                if (file_exists($directory) && is_dir($directory)) {
                    return [$className => self::loadDirectory($directory, $className)];
                } else {
                    return $className;
                }
            }
        }

        return false;
    }
}

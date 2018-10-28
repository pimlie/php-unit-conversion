<?php

namespace PhpUnitConversion;

class TypeRegistry
{
    protected $types = [];

    /**
     * @param string $directory
     * @param string $namespace
     * @param string $globPattern
     */
    public function loadDirectory($directory, $namespace, $globPattern = '**/*.php')
    {
        $classes = [];

        foreach (glob($directory . $globPattern) as $file) {
            $class = $namespace . str_replace([$directory, '.php', '/'], ['', '', '\\'], $file);

            if (class_exists($class)) {
                $classes[] = $class;
            }
        }

        $this->types = array_unique(array_merge($this->types, $classes));
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    public function clear()
    {
        $this->types = [];
    }
}

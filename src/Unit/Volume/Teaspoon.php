<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Teaspoon extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 1/768;

    const SYMBOL = 'tsp';
    const LABEL = 'teaspoon';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class DryGallon extends DryPint
{
    use HasRelativeFactor;

    const FACTOR = 8;

    const SYMBOL = 'gal';
    const LABEL = '(dry) gallon';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Bushel extends DryPint
{
    use HasRelativeFactor;

    const FACTOR = 64;

    const SYMBOL = 'bu';
    const LABEL = 'bushel';
}

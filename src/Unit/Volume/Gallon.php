<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Unit\Volume;
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Traits\HasFactor;

class Gallon extends Volume implements Imperial
{
    use HasFactor;

    const FACTOR = 0.00454609;

    const SYMBOL = 'gal';
    const LABEL = 'gallon';
}

<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Peck extends DryPint
{
    use HasRelativeFactor;

    const FACTOR = 16;

    const SYMBOL = 'pk';
    const LABEL = 'peck';
}

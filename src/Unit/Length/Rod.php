<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Rod extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 5.5;

    const SYMBOL = 'rod';
    const LABEL = 'rod';
}

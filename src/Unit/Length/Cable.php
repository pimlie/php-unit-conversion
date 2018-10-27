<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Cable extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 240;

    const SYMBOL = 'cb';
    const LABEL = 'cable';
}

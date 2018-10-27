<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class ImperialFathom extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 2.02667;

    const SYMBOL = 'fur';
    const LABEL = 'furlong';
}

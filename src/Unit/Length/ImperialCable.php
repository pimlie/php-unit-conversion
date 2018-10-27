<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class ImperialCable extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 202 + 2/3;

    const SYMBOL = 'fur';
    const LABEL = 'furlong';
}

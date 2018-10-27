<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class ImperialNauticalMile extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 2026 + 2/3;

    const SYMBOL = 'fur';
    const LABEL = 'furlong';
}

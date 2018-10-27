<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class SquareMile extends SquareYard
{
    use HasRelativeFactor;

    const FACTOR = 3097600;

    const SYMBOL = 'mi2';
    const LABEL = 'square mile';
}

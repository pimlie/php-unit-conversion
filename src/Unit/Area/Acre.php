<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Acre extends SquareYard
{
    use HasRelativeFactor;

    const FACTOR = 4840;

    const SYMBOL = 'acre';
    const LABEL = 'acre';
}

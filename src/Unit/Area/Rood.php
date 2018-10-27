<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Rood extends SquareYard
{
    use HasRelativeFactor;

    const FACTOR = 1210;

    const SYMBOL = 'rood';
    const LABEL = 'rood';
}

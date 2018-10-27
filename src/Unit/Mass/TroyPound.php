<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\Traits\HasRelativeFactor;

class TroyPound extends TroyOunce
{
    use HasRelativeFactor;

    const FACTOR = 12;

    const SYMBOL = 'lb t';
    const LABEL = 'troy pound';
}

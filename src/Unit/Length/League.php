<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class League extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 5280;

    const SYMBOL = 'lea';
    const LABEL = 'league';
}

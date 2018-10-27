<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Chain extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 22;

    const SYMBOL = 'ch';
    const LABEL = 'chain';
}

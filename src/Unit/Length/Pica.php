<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Pica extends Yard
{
    use HasRelativeFactor;

    const FACTOR = 1/216;

    const SYMBOL = 'P̸';
    const LABEL = 'pica';
}

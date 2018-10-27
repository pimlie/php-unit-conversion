<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Minim extends Gallon
{
    use HasRelativeFactor;

    const FACTOR = 1/76800;

    const SYMBOL = 'm';
    const LABEL = 'minim';
}

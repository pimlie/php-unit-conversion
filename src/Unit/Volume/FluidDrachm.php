<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class FluidDrachm extends Gallon
{
    use HasRelativeFactor;

    const FACTOR = 1/1280;

    const SYMBOL = 'fl dr';
    const LABEL = 'fluid drachm';
}

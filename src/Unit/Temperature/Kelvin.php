<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\Traits\BaseUnit;
use PhpUnitConversion\Unit\Temperature;

class Kelvin extends Temperature
{
    use BaseUnit;

    const SYMBOL = 'K';
    const LABEL = 'Kelvin';
}

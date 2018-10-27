<?php
namespace PhpUnitConversion\Unit\Temperature;

use PhpUnitConversion\System\USC;

class Fahrenheit extends Kelvin implements USC
{
    const FACTOR = 5/9;
    const ADDITION_PRE = 459.67;

    const SYMBOL = '°F';
    const LABEL = 'fahrenheit';
}

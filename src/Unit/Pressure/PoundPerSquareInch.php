<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Pressure;

class PoundPerSquareInch extends Pressure implements USC
{
	const FACTOR = 6894.75728;

    const SYMBOL = 'psi';
    const LABEL = 'pound per square inch';
}
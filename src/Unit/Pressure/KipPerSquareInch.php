<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\USC;
use PhpUnitConversion\Unit\Pressure;

class KipPerSquareInch extends Pressure implements USC
{
	const FACTOR = 6894757.279999912;

    const SYMBOL = 'ksi';
    const LABEL = 'kip per square inch';
}
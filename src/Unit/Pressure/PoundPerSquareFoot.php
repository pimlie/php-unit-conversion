<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\USC;

class PoundPerSquareFoot extends PoundPerSquareInch implements USC
{
	const FACTOR = 47.88025;

    const SYMBOL = 'psf';
    const LABEL = 'pound per square foot';
}
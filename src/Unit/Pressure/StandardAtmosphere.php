<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\Unit\Pressure;

class StandardAtmosphere extends Pressure
{
	const FACTOR = 101325;

    const SYMBOL = 'atm';
    const LABEL = 'standard atmosphere';
}
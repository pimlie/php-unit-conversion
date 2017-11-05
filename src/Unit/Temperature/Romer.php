<?php
namespace PhpUnitConversion\Unit\Temperature;

class Romer extends Kelvin
{
    const ADDITION_PRE = -7.5;
    const FACTOR = 40/21;
    const ADDITION_POST = 273.15;

    const SYMBOL = '°Rø';
    const LABEL = 'Rømer';
}

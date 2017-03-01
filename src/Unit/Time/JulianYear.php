<?php
namespace PhpUnitConversion\Unit\Time;

use PhpUnitConversion\Unit\Time;

class Year extends Time
{
    const FACTOR = 31557600;
    
    const SYMBOL = 'jy';
    const LABEL = 'julian year';
}
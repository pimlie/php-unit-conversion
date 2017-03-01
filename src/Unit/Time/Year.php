<?php
namespace PhpUnitConversion\Unit\Time;

use PhpUnitConversion\Unit\Time;

class Year extends Time
{
    const FACTOR = 31556952;
    
    const SYMBOL = 'y';
    const LABEL = 'year';
}
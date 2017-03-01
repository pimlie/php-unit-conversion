<?php
namespace PhpUnitConversion\Unit\Time;

use PhpUnitConversion\Unit\Time;
use PhpUnitConversion\Traits\BaseUnit;

class Second extends Time
{
    use BaseUnit;

    const SYMBOL = 's';
    const LABEL = 'second';
}
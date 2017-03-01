<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;

class Time extends Unit
{
    const TYPE = Unit::TYPE_TIME;
    const BASE_UNIT = Time\Second::class;
}
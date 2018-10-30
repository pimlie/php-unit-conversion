<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversionTest\Fixtures\MyUnitType;
use PhpUnitConversion\Traits\HasFactor;

class ThirdUnitRelativeFromBase extends MyUnitType
{
    use HasFactor;

    const FACTOR = 1/3;

    const SYMBOL = 'tu';
    const LABEL = 'thirds unit';
}

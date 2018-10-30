<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversionTest\Fixtures\MyUnitType;
use PhpUnitConversion\Traits\HasFactor;

class HalfUnit extends MyUnitType
{
    use HasFactor;

    const FACTOR = 0.5;

    const SYMBOL = 'hu';
    const LABEL = 'half unit';
}

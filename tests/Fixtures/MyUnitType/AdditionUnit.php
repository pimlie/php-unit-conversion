<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversion\Traits\HasFactor;

class AdditionUnit extends OneUnit
{
    use HasFactor;

    const ADDITION_PRE = 3;
    const ADDITION_POST = -5;
    const FACTOR = 2;

    const SYMBOL = 'au';
    const LABEL = 'addition unit';
}

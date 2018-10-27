<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversion\Traits\HasRelativeFactor;

use PhpUnitConversionTest\Fixtures\MyUnitType;

class RelativeAdditionUnit extends DoubleUnit
{
    use HasRelativeFactor;

    const ADDITION_PRE = 1;
    const ADDITION_POST = -2;
    const FACTOR = 2;
    
    const SYMBOL = 'au';
    const LABEL = 'addition unit';
}

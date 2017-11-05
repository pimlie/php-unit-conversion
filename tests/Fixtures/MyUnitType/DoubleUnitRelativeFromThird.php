<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversion\Traits\HasRelativeFactor;

class DoubleUnitRelativeFromThird extends ThirdUnitRelativeFromBase
{
    use HasRelativeFactor;

    const FACTOR = 6;
    
    const SYMBOL = 'durt';
    const LABEL = 'double unit relative from third';
}

<?php
namespace PhpUnitConversionTest\Fixtures\MyUnitType;

use PhpUnitConversion\Traits\HasRelativeFactor;

class DoubleUnitRelativeFromHalf extends HalfUnit
{
    use HasRelativeFactor;

    const FACTOR = 4;

    const SYMBOL = 'durh';
    const LABEL = 'double unit relative from half';
}

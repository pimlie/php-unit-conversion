<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class USFluidDram extends USLiquidGallon
{
    use HasRelativeFactor;

    const FACTOR = 1/1024;

    const SYMBOL = 'fl dr';
    const LABEL = 'US fluid dram';
}

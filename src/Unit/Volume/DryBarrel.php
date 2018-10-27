<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\Traits\HasRelativeFactor;

class DryBarrel extends DryPint
{
    use HasRelativeFactor;

    const FACTOR = 209.998046893;

    const SYMBOL = 'bbl';
    const LABEL = '(dry) barrel';
}

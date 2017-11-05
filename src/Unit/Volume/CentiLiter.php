<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class CentiLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-2;

    const SYMBOL = 'cl';
    const LABEL = 'centiliter';
}

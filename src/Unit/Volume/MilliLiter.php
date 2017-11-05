<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasFactor;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MilliLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-3;

    const SYMBOL = 'ml';
    const LABEL = 'milliliter';
}

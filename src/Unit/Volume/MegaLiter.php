<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MegaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E6;

    const SYMBOL = 'Ml';
    const LABEL = 'megaliter';
}

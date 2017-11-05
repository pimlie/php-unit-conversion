<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ExaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E18;

    const SYMBOL = 'El';
    const LABEL = 'exaliter';
}

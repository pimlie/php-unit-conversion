<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YoctoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-24;

    const SYMBOL = 'yl';
    const LABEL = 'yoctoliter';
}

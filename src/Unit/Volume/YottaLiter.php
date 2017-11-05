<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class YottaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E24;

    const SYMBOL = 'Yl';
    const LABEL = 'yottaliter';
}

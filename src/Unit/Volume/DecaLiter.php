<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DecaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E1;

    const SYMBOL = 'dal';
    const LABEL = 'decaliter';
}

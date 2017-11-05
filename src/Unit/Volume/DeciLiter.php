<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DeciLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-1;

    const SYMBOL = 'dl';
    const LABEL = 'deciliter';
}

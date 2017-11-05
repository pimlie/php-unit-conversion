<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MicroLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-6;

    const SYMBOL = 'μl';
    const LABEL = 'microliter';
}

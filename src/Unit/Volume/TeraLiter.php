<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class TeraLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E12;

    const SYMBOL = 'Tl';
    const LABEL = 'teraliter';
}

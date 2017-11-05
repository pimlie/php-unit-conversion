<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZeptoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-21;

    const SYMBOL = 'zl';
    const LABEL = 'zeptoliter';
}

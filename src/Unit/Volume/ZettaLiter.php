<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZettaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E21;

    const SYMBOL = 'Zl';
    const LABEL = 'zettaliter';
}

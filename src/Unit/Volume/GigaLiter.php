<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class GigaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E9;

    const SYMBOL = 'Gl';
    const LABEL = 'gigaliter';
}

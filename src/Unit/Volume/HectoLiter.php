<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class HectoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E2;

    const SYMBOL = 'hl';
    const LABEL = 'hectoliter';
}

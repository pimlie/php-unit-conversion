<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class NanoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-9;

    const SYMBOL = 'nl';
    const LABEL = 'nanoliter';
}

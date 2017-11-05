<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class AttoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-18;

    const SYMBOL = 'al';
    const LABEL = 'attoliter';
}

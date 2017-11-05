<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasFactor;
use PhpUnitConversion\Unit\Volume;

class Liter extends Volume implements Metric
{
    use HasFactor;

    const FACTOR = 1E-3;

    const SYMBOL = 'l';
    const LABEL = 'liter';
}

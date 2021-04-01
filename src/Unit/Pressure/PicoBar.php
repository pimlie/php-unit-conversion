<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PicoBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-12;

    const SYMBOL = 'pbar';
    const LABEL = 'picobar';
}

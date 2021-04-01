<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PetaBar extends Bar implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E15;

    const SYMBOL = 'Pbar';
    const LABEL = 'petabar';
}

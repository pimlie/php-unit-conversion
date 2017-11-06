<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class KiloMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E3;

    const SYMBOL = 'kmol';
    const LABEL = 'kilomole';
}

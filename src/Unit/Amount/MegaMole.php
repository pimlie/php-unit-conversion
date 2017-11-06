<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MegaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E6;

    const SYMBOL = 'Mmol';
    const LABEL = 'megamole';
}

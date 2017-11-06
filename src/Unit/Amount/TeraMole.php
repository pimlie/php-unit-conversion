<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class TeraMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E12;

    const SYMBOL = 'Tmol';
    const LABEL = 'teramole';
}

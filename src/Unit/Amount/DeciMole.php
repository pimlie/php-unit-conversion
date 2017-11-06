<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class DeciMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-1;

    const SYMBOL = 'dmol';
    const LABEL = 'decimole';
}

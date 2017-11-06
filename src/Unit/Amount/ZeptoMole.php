<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZeptoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-21;

    const SYMBOL = 'zmol';
    const LABEL = 'zeptomole';
}

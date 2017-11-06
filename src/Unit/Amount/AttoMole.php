<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class AttoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-18;

    const SYMBOL = 'amol';
    const LABEL = 'attomole';
}

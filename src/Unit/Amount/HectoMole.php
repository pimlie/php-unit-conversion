<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class HectoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E2;

    const SYMBOL = 'hmol';
    const LABEL = 'hectomole';
}

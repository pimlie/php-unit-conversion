<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class NanoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-9;

    const SYMBOL = 'nmol';
    const LABEL = 'nanomole';
}

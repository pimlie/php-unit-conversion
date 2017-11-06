<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class CentiMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-2;

    const SYMBOL = 'cmol';
    const LABEL = 'centimole';
}

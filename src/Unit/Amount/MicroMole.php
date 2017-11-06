<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class MicroMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-6;

    const SYMBOL = 'μmol';
    const LABEL = 'micromole';
}

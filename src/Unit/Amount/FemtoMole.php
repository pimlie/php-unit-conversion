<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class FemtoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-15;

    const SYMBOL = 'fmol';
    const LABEL = 'femtomole';
}

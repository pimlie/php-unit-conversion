<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PicoMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-12;

    const SYMBOL = 'pmol';
    const LABEL = 'picomole';
}

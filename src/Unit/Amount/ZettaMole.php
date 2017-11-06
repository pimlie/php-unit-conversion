<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ZettaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E21;

    const SYMBOL = 'Zmol';
    const LABEL = 'zettamole';
}

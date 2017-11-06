<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ExaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E18;

    const SYMBOL = 'Emol';
    const LABEL = 'examole';
}

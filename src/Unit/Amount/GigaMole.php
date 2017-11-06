<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class GigaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E9;

    const SYMBOL = 'Gmol';
    const LABEL = 'gigamole';
}

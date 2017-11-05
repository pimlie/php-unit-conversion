<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class FemtoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-15;

    const SYMBOL = 'fl';
    const LABEL = 'femtoliter';
}

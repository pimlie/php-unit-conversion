<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PetaLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E15;

    const SYMBOL = 'Pl';
    const LABEL = 'petaliter';
}

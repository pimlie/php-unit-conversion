<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PetaMole extends Mole implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E15;

    const SYMBOL = 'Pmol';
    const LABEL = 'petamole';
}

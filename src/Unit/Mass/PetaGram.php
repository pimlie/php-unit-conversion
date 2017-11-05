<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class PetaGram extends Gram implements Metric
{
    const FACTOR = 1E15;

    const SYMBOL = 'Pg';
    const LABEL = 'petagram';
}

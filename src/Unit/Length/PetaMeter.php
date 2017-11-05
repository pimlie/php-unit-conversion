<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class PetaMeter extends Meter implements Metric
{
    const FACTOR = 1E15;

    const SYMBOL = 'Pm';
    const LABEL = 'petameter';
}

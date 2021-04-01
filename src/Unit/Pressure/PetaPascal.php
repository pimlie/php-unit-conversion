<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;

class PetaPascal extends Pascal implements Metric
{
    const FACTOR = 1E15;

    const SYMBOL = 'PPa';
    const LABEL = 'petapascal';
}

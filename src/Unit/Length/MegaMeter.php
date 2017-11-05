<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class MegaMeter extends Meter implements Metric
{
    const FACTOR = 1E6;

    const SYMBOL = 'Mm';
    const LABEL = 'megameter';
}

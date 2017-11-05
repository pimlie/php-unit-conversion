<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class GigaMeter extends Meter implements Metric
{
    const FACTOR = 1E9;

    const SYMBOL = 'Gm';
    const LABEL = 'gigameter';
}

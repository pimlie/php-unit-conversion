<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class TeraMeter extends Meter implements Metric
{
    const FACTOR = 1E12;

    const SYMBOL = 'Tm';
    const LABEL = 'terameter';
}

<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;

class ZettaMeter extends Meter implements Metric
{
    const FACTOR = 1E21;

    const SYMBOL = 'Zm';
    const LABEL = 'zettameter';
}

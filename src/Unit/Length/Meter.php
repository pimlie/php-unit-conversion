<?php
namespace PhpUnitConversion\Unit\Length;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Length;
use PhpUnitConversion\Traits\BaseUnit;

class Meter extends Length implements Metric
{
    use BaseUnit;

    const SYMBOL = 'm';
    const LABEL = 'meter';
}

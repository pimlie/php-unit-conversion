<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Traits\BaseUnit;

class Gram extends Mass implements Metric
{
    use BaseUnit;

    const SYMBOL = 'g';
    const LABEL = 'gram';
}
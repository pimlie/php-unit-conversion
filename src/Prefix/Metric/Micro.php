<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Micro extends Metric
{
    const FACTOR = 0.000001;
    
    const PREFIX_SYMBOL = 'μ';
    const PREFIX_LABEL = 'micro';
}

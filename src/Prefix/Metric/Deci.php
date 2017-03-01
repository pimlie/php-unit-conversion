<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Deci extends Metric
{
    const FACTOR = 0.1;
    
    const PREFIX_SYMBOL = 'd';
    const PREFIX_LABEL = 'deci';
}
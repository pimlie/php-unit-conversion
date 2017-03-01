<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Hecto extends Metric
{
    const FACTOR = 100;
    
    const PREFIX_SYMBOL = 'h';
    const PREFIX_LABEL = 'hecto';
}
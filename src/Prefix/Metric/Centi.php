<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Centi extends Metric
{
    const FACTOR = 0.01;
    
    const PREFIX_SYMBOL = 'c';
    const PREFIX_LABEL = 'centi';
}
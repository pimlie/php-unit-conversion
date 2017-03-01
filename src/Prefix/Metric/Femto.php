<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Femto extends Metric
{
    const FACTOR = 0.000000000000001;
    
    const PREFIX_SYMBOL = 'f';
    const PREFIX_LABEL = 'femto';
}
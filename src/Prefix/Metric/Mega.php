<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Mega extends Metric
{
    const FACTOR = 1000000;
    
    const PREFIX_SYMBOL = 'M';
    const PREFIX_LABEL = 'mega';
}
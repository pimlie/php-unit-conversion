<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Kilo extends Metric
{
    const FACTOR = 1000;
    
    const PREFIX_SYMBOL = 'k';
    const PREFIX_LABEL = 'kilo';
}
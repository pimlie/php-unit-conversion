<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Giga extends Metric
{
    const FACTOR = 1000000000;
    
    const PREFIX_SYMBOL = 'G';
    const PREFIX_LABEL = 'giga';
}
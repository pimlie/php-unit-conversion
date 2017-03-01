<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Exa extends Metric
{
    const FACTOR = 100000000000000000000;
    
    const PREFIX_SYMBOL = 'E';
    const PREFIX_LABEL = 'exa';
}
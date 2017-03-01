<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Deca extends Metric
{
    const FACTOR = 10;
    
    const PREFIX_SYMBOL = 'da';
    const PREFIX_LABEL = 'deca';
}
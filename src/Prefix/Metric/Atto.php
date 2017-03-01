<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Atto extends Metric
{
    const FACTOR = 0.000000000000000001;
    
    const PREFIX_SYMBOL = 'a';
    const PREFIX_LABEL = 'atto';
}
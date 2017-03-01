<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Milli extends Metric
{
    const FACTOR = 0.001;
    
    const PREFIX_SYMBOL = 'm';
    const PREFIX_LABEL = 'milli';
}
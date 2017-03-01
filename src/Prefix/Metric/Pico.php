<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Pico extends Metric
{
    const FACTOR = 0.000000000001;
    
    const PREFIX_SYMBOL = 'p';
    const PREFIX_LABEL = 'pico';
}
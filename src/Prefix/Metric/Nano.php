<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Nano extends Metric
{
    const FACTOR = 0.000000001;
    
    const PREFIX_SYMBOL = 'n';
    const PREFIX_LABEL = 'nano';
}
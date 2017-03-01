<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Zetta extends Metric
{
    const FACTOR = 100000000000000000000000;
    
    const PREFIX_SYMBOL = 'Z';
    const PREFIX_LABEL = 'zetta';
}
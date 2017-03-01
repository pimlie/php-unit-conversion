<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Yotta extends Metric
{
    const FACTOR = 100000000000000000000000000;
    
    const PREFIX_SYMBOL = 'Y';
    const PREFIX_LABEL = 'yotta';
}
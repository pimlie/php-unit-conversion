<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Yocto extends Metric
{
    const FACTOR = 0.000000000000000000000001;
    
    const PREFIX_SYMBOL = 'y';
    const PREFIX_LABEL = 'yocto';
}
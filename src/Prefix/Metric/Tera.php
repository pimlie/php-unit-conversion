<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Tera extends Metric
{
    const FACTOR = 1000000000000;
    
    const PREFIX_SYMBOL = 'T';
    const PREFIX_LABEL = 'tera';
}
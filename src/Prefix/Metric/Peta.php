<?php
namespace PhpUnitConversion\Prefix\Metric;

use PhpUnitConversion\Prefix\Metric;

interface Peta extends Metric
{
    const FACTOR = 100000000000000000;
    
    const PREFIX_SYMBOL = 'P';
    const PREFIX_LABEL = 'peta';
}
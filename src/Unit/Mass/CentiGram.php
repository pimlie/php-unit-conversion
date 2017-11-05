<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Metric;

class CentiGram extends Gram implements Metric
{
    const FACTOR = 1E-2;

    const SYMBOL = 'cg';
    const LABEL = 'centigram';
}

<?php

namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\BaseUnit;
use PhpUnitConversion\Unit\Pressure;

class Pascal extends Pressure implements Metric
{
	use BaseUnit;

    const SYMBOL = 'Pa';
    const LABEL = 'pascal';
}

<?php
namespace PhpUnitConversion\Unit\Pressure;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasFactor;
use PhpUnitConversion\Unit\Pressure;

class Bar extends Pressure implements Metric
{
	use HasFactor;

	const FACTOR = 1E5;

    const SYMBOL = 'bar';
    const LABEL = 'bar';
}
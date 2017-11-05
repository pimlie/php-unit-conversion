<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PicoLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E-12;

    const SYMBOL = 'pl';
    const LABEL = 'picoliter';
}

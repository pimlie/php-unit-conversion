<?php
namespace PhpUnitConversion\Unit\Volume;

use PhpUnitConversion\System\Metric;
use PhpUnitConversion\Traits\HasRelativeFactor;

class KiloLiter extends Liter implements Metric
{
    use HasRelativeFactor;

    const FACTOR = 1E3;

    const SYMBOL = 'kl';
    const LABEL = 'kiloliter';
}

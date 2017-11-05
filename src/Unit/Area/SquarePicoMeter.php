<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquarePicoMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E-24;

    const SYMBOL = 'pm2';
    const LABEL = 'square picometer';
}

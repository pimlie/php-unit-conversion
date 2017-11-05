<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\System\Metric;

class SquarePetaMeter extends SquareMeter implements Metric
{
    const FACTOR = 1E30;

    const SYMBOL = 'Pm2';
    const LABEL = 'square petameter';
}

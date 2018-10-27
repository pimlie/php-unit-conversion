<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Traits\HasRelativeFactor;

class LongHundredWeight extends AvoirdupoisPound implements Imperial
{
    use HasRelativeFactor;

    const FACTOR = 112;

    const SYMBOL = 'long cwt';
    const LABEL = 'long hundredweight';
}

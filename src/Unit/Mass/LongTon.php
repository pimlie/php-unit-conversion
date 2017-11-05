<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Traits\HasRelativeFactor;

class LongTon extends AvoirdupoisPound implements Imperial
{
    use hasRelativeFactor;
    
    const FACTOR = 2240;
    
    const SYMBOL = '';
    const LABEL = 'long ton';
}

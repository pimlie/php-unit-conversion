<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\HasRelativeFactor;

class ShortTon extends AvoirdupoisPound implements USC
{
    use hasRelativeFactor;
    
    const FACTOR = 2000;
    
    const SYMBOL = '';
    const LABEL = 'short ton';
}

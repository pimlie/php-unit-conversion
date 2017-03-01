<?php
namespace PhpUnitConversion\Unit\Mass;

use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Traits\HasRelativeFactor;

class PennyWeight extends TroyOunce
{
    use HasRelativeFactor;
    //const FACTOR = 1.55517384;
    const FACTOR = 20;
    
    const SYMBOL = 'dwt';
    const LABEL = 'pennyweight';
}
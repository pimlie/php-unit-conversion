<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\Unit\Amount;
use PhpUnitConversion\Traits\BaseUnit;

class Quantity extends Amount
{
    use BaseUnit;
    
    const FACTOR = 1;

    const SYMBOL = 'qty';
    const LABEL = 'quantity';
}

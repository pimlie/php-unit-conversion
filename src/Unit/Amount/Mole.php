<?php
namespace PhpUnitConversion\Unit\Amount;

use PhpUnitConversion\Traits\HasFactor;

class Mole extends Quantity
{
    use HasFactor;

    const FACTOR = 6.022140587E23;

    const SYMBOL = 'mol';
    const LABEL = 'mole';
}

<?php
namespace PhpUnitConversion\Unit;

use PhpUnitConversion\Unit;
use PhpUnitConversion\UnitType;

class Amount extends Unit
{
    const TYPE = UnitType::AMOUNT;

    const BASE_UNIT = Amount\Quantity::class;
}

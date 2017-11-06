<?php
namespace PhpUnitConversion;

use MyCLabs\Enum\Enum;

class UnitType extends Enum
{
    // If we get more then 63 TYPE constants we need
    // to adjust the shift 6 in __invoke && ::from
    const MASS = 1;
    const LENGTH = 2;
    const AREA = 3;
    const VOLUME = 4;
    const TIME = 5;
    const TEMPERATURE = 6;
    const AMOUNT = 7;
}

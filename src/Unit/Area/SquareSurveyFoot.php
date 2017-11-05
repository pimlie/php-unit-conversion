<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Unit\Area;
use PhpUnitConversion\System\USC;
use PhpUnitConversion\Traits\HasFactor;

class SquareSurveyFoot extends Area implements USC
{
    use HasFactor;

    const FACTOR = 0.0929034116133;
    
    const SYMBOL = 'ft2';
    const LABEL = 'square survey foot';
}

<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class SurveyTownship extends SquareSurveyFoot
{
    use HasRelativeFactor;

    const FACTOR = 36*640*43560;

    const SYMBOL = 'twp';
    const LABEL = 'survey township';
}

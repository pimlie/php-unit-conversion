<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class SurveyAcre extends SquareSurveyFoot
{
    use HasRelativeFactor;
    
    const FACTOR = 43560;
    
    const SYMBOL = 'ch2';
    const LABEL = 'square survey chain';
}

<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class Section extends SquareSurveyFoot
{
    use HasRelativeFactor;
    
    const FACTOR = 640*43560;
    
    const SYMBOL = 'section';
    const LABEL = 'section';
}

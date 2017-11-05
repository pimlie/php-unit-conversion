<?php
namespace PhpUnitConversion\Unit\Area;

use PhpUnitConversion\Traits\HasRelativeFactor;

class SquareSurveyChain extends SquareSurveyFoot
{
    use HasRelativeFactor;
    
    const FACTOR = 4356;
    
    const SYMBOL = 'ch2';
    const LABEL = 'square survey chain';
}

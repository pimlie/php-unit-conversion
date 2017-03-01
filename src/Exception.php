<?php

namespace PhpUnitConversion;

class Exception extends \Exception
{
    protected $error;
    
    public function __construct(array $variables = [])
    {
        parent::__construct(strtr($this->error, $variables));
    }
}

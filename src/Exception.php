<?php

namespace PhpUnitConversion;

class Exception extends \Exception
{
    /** @var string */
    protected $error;

    /**
     * @param array $variables
     */
    public function __construct(array $variables = [])
    {
        parent::__construct(strtr($this->error, $variables));
    }
}

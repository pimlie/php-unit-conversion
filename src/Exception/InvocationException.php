<?php
namespace PhpUnitConversion\Exception;

use PhpUnitConversion\Exception;

class InvocationException extends Exception
{
    protected $error = 'This method cannot be called on :0';
}

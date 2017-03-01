<?php
namespace PhpUnitConversion\Exception;

use PhpUnitConversion\Exception;

class UnsupportedUnitException extends Exception
{
    protected $error = 'Unit :0 is not supported in this method';
}

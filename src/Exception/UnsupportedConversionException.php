<?php
namespace PhpUnitConversion\Exception;

use PhpUnitConversion\Exception;

class UnsupportedConversionException extends Exception
{
    protected $error = 'Conversion from (:0) to (:1) is not supported';
}

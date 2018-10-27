<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Amount;

class AmountTest extends TestCase
{
    public function testFromMole()
    {
        $amountUnit = new Amount\Mole(1);
        $this->assertEquals('602214058700000030883840 qty', Amount\Quantity::from($amountUnit)->format(0));
    }
}

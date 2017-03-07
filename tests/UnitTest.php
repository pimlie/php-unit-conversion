<?php
namespace PhpUnitConversionTest;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Mass;

class UnitTest extends TestCase
{
    public function testTypeValues()
    {
        $kiloGrams = new Mass\KiloGram(1);
        
        $typeValue = $kiloGrams();
        
        $this->assertEquals(64001, $typeValue);
        
        $grams = Unit::from($typeValue);
        
        $this->assertInstanceOf(Mass\Gram::class, $grams);
        
        $this->assertEquals(1, $grams->to(Mass\KiloGram::class)->getValue());
        
    }
    
    
}
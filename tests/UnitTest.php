<?php
namespace PhpUnitConversionTest;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\System;
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
    
    public function testNearestUnit()
    {
        $grams = new Mass\Gram(850);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\Metric::class);
        
        $this->assertInstanceOf(Mass\HectoGram::class, $unit);
    }

    public function testNearestUnit90()
    {
        $grams = new Mass\Gram(900);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\Metric::class);
        
        $this->assertInstanceOf(Mass\KiloGram::class, $unit);
    }

    public function testNearestUnitOtherSystem()
    {
        $grams = new Mass\Gram(850);
        
        $unit = Mass::nearest($grams, \PhpUnitConversion\System\USC::class);
        
        $this->assertInstanceOf(Mass\Pound::class, $unit);
        $this->assertEquals('1.874 lb', $unit->format());
    }

    public function testInvalidInvocation()
    {
        $this->expectException(Exception::class);
        
        Unit::nearest(new Mass\Gram(1));
    }
}
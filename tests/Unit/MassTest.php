<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Exception;
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Mass;

class MassTest extends TestCase
{
    public function testFromPicoGram()
    {
        $massUnit = new Mass\NanoGram(0.21);
        $this->assertEquals('210 pg', Mass\PicoGram::from($massUnit)->format(0));
    }
    
    public function testFromNanoGram()
    {
        $massUnit = new Mass\MicroGram(0.21);
        $this->assertEquals('210 ng', Mass\NanoGram::from($massUnit)->format(0));
    }
    
    public function testFromMicroGram()
    {
        $massUnit = new Mass\MilliGram(0.21);
        $this->assertEquals('210 μg', Mass\MicroGram::from($massUnit)->format(0));
    }
    
    public function testFromMilliGram()
    {
        $massUnit = new Mass\Gram(0.21);
        $this->assertEquals('210 mg', Mass\MilliGram::from($massUnit)->format(0));
    }
    
    public function testFromCentiGram()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('2100 cg', Mass\CentiGram::from($massUnit)->format(0));
    }
    
    public function testFromDeciGram()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('210 dg', Mass\DeciGram::from($massUnit)->format(0));
    }

    public function testFromDecaGram()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('2.100 dag', Mass\DecaGram::from($massUnit)->format(3));
    }
    
    public function testFromHectoGram()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.210 hg', Mass\HectoGram::from($massUnit)->format(3));
    }
    
    public function testFromKiloGram()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.021 kg', Mass\KiloGram::from($massUnit)->format(3));
    }
    
    public function testFromMegaGram()
    {
        $massUnit = new Mass\KiloGram(21);
        $this->assertEquals('0.021 Mg', Mass\MegaGram::from($massUnit)->format(3));
    }
    
    public function testFromGrain()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('324.080 gr', Mass\Grain::from($massUnit)->format());
    }
    
    public function testFromDrachm()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('11.852 dr', Mass\Drachm::from($massUnit)->format());
    }
    public function testFromOunce()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.741 oz', Mass\Ounce::from($massUnit)->format());
    }
    
    public function testFromPound()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.046 lb', Mass\Pound::from($massUnit)->format());
    }
    
    public function testFromStone()
    {
        $massUnit = new Mass\KiloGram(21);
        $this->assertEquals('3.307 st', Mass\Stone::from($massUnit)->format());
    }
    
    public function testFromQuarter()
    {
        $massUnit = new Mass\KiloGram(21);
        $this->assertEquals('1.653 qr', Mass\Quarter::from($massUnit)->format());
    }
    
    public function testFromShortHundredWeight()
    {
        $massUnit = new Mass\KiloGram(21);
        $this->assertEquals('0.463 sh cwt', Mass\ShortHundredWeight::from($massUnit)->format());
    }
    
    public function testFromLongHundredWeight()
    {
        $massUnit = new Mass\KiloGram(21);
        $this->assertEquals('0.413 long cwt', Mass\LongHundredWeight::from($massUnit)->format());
    }
    
    public function testFromTonne()
    {
        $massUnit = new Mass\MegaGram(21);
        $this->assertEquals('21.000 tonne', Mass\Tonne::from($massUnit)->format());
    }
    public function testFromShortTon()
    {
        $massUnit = new Mass\MegaGram(21);
        $this->assertEquals('23.149', Mass\ShortTon::from($massUnit)->format());
    }
    
    public function testFromLongTon()
    {
        $massUnit = new Mass\MegaGram(21);
        $this->assertEquals('20.668', Mass\LongTon::from($massUnit)->format());
    }
    
    public function testFromTroyOunce()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.675 oz t', Mass\TroyOunce::from($massUnit)->format());
    }
    
    public function testFromTroyPound()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('0.05626 lb t', Mass\TroyPound::from($massUnit)->format(5));
    }
    
    public function testFromPennyWeight()
    {
        $massUnit = new Mass\Gram(21);
        $this->assertEquals('13.503 dwt', Mass\PennyWeight::from($massUnit)->format());
    }
    
    public function testToMilliGram()
    {
        $massUnit = new Mass\Gram(21);

        $milliGram = $massUnit->to(Mass\MilliGram::class);

        $this->assertEquals('21000 mg', $milliGram->format(0));
    }

    public function testToKiloGram()
    {
        $massUnit = new Mass\Gram(21);
        $kiloGram = new Mass\KiloGram;

        $massUnit->to($kiloGram);

        $this->assertEquals('0.021 kg', $kiloGram->format());
    }

    public function testToOunce()
    {
        $massUnit = new Mass\Gram(21);

        $ounce = $massUnit->to(new Mass\Ounce);

        $this->assertEquals('0.741 oz', $ounce->format());
    }

    public function testToTimeWhichShouldFail()
    {
        $this->expectException(Exception::class);
        
        $massUnit = new Mass\Gram(21);

        $ounce = $massUnit->to(new Unit\Time\Second);
    }

    public function testFromString()
    {
        $massUnit = Unit::from('21 mg');
        
        $this->assertInstanceOf(Mass\MilliGram::class, $massUnit);
    }
    
    public function testAddition()
    {
        $massUnit = new Mass\Gram(580);
        
        $newUnit = $massUnit->add(new Mass\KiloGram(0.4), new Mass\Gram(11));
        
        $this->assertEquals('991 g', $newUnit->format(0) );
    }

    public function testSubstraction()
    {
        $massUnit = new Mass\Gram(580);
        
        $newUnit = $massUnit->substract(new Mass\KiloGram(0.4), new Mass\Gram(11));
        
        $this->assertEquals('169 g', $newUnit->format(0) );
    }
}

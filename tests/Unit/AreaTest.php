<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Area;

class AreaTest extends TestCase
{
    public function testFromAre()
    {
        $areaUnit = new Area\Are(1);
        $this->assertEquals('100 m2', Area\SquareMeter::from($areaUnit)->format(0));
    }
    public function testFromHectare()
    {
        $areaUnit = new Area\Hectare(1);
        $this->assertEquals('10000 m2', Area\SquareMeter::from($areaUnit)->format(0));
    }
    public function testFromPerch()
    {
        $areaUnit = new Area\Perch(1);
        $this->assertEquals('25.293 m2', Area\SquareMeter::from($areaUnit)->format(3));
    }
    public function testFromRood()
    {
        $areaUnit = new Area\Rood(1);
        $this->assertEquals('1011.714 m2', Area\SquareMeter::from($areaUnit)->format(3));
    }
    public function testFromAcre()
    {
        $areaUnit = new Area\Acre(1);
        $this->assertEquals('4046.856 m2', Area\SquareMeter::from($areaUnit)->format(3));
    }
    public function testFromSquareSurveyFoot()
    {
        $areaUnit = new Area\SquareSurveyFoot(1);
        $this->assertEquals('0.09290341 m2', Area\SquareMeter::from($areaUnit)->format(8));
    }
    public function testFromSquareSurveyChain()
    {
        $areaUnit = new Area\SquareSurveyChain(1);
        $this->assertEquals('404.687 m2', Area\SquareMeter::from($areaUnit)->format(3));
    }
    public function testFromSurveyAcre()
    {
        $areaUnit = new Area\SurveyAcre(1);
        $this->assertEquals('4046.873 m2', Area\SquareMeter::from($areaUnit)->format(3));
    }
    public function testFromSection()
    {
        $areaUnit = new Area\Section(1);
        $this->assertEquals('2.590 km2', Area\SquareKiloMeter::from($areaUnit)->format(3));
    }
    public function testFromSurveyTownship()
    {
        $areaUnit = new Area\SurveyTownship(1);
        $this->assertEquals('93.240 km2', Area\SquareKiloMeter::from($areaUnit)->format(3));
    }
}

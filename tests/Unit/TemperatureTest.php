<?php
namespace PhpUnitConversionTest\Unit;

use PHPUnit\Framework\TestCase;
use PhpUnitConversion\Unit\Temperature;

class TemperatureTest extends TestCase
{
    public function testCelsiusToFahrenheit()
    {
        $tempUnit = new Temperature\Celsius(50);
        $this->assertEquals('122.0 °F', Temperature\Fahrenheit::from($tempUnit)->format(1));
    }

    public function testFahrenheitToCelsius()
    {
        $tempUnit = new Temperature\Fahrenheit(50);
        $this->assertEquals('10.0 °C', Temperature\Celsius::from($tempUnit)->format(1));
    }

    public function testCelsiusToKelvin()
    {
        $tempUnit = new Temperature\Celsius(50);
        $this->assertEquals('323.15 K', Temperature\Kelvin::from($tempUnit)->format(2));
    }

    public function testKelvinToFahrenheit()
    {
        $tempUnit = new Temperature\Kelvin(50);
        $this->assertEquals('-369.67 °F', Temperature\Fahrenheit::from($tempUnit)->format(2));
    }

    public function testRankineToFahrenheit()
    {
        $tempUnit = new Temperature\Rankine(50);
        $this->assertEquals('-409.67 °F', Temperature\Fahrenheit::from($tempUnit)->format(2));
    }

    public function testFahrenheitToRankine()
    {
        $tempUnit = new Temperature\Fahrenheit(50);
        $this->assertEquals('509.67 °R', Temperature\Rankine::from($tempUnit)->format(2));
    }

    public function testCelsiusToRankine()
    {
        $tempUnit = new Temperature\Celsius(75);
        $this->assertEquals('626.67 °R', Temperature\Rankine::from($tempUnit)->format(2));
    }

    public function testCelsiusToRomer()
    {
        $tempUnit = new Temperature\Celsius(75);
        $this->assertEquals('46.875 °Rø', Temperature\Romer::from($tempUnit)->format(3));
    }

    public function testRomerToRankine()
    {
        $tempUnit = new Temperature\Romer(50);
        $this->assertEquals('637.38 °R', Temperature\Rankine::from($tempUnit)->format(2));
    }

}
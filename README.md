# Php Unit Conversion

The `php-unit-conversion/php-unit-conversion` package provides full PSR-4 compatible unit conversion. Most other packages that are available for unit conversion are using `string` types to indicate unit types. In this package all unit types are classes.

We still need to add a lot more units and tests to make the package more usefull. If you want to help me with that, please check [Contributing](CONTRIBUTING.md)!

## Basic Usage
```php
use PhpUnitConversion\Unit\Mass;
$milliGram = new Mass\MilliGram(12);
$milliGram->getValue(); // 12
$milliGram->getSymbol(); // 'mg'

/* A format method is available that accepts two parameters:
 * @integer precision
 * @boolean add_symbol
 */
$milliGram->format(3, false); // 12.000

/* Units are set relative to the BASE_UNIT of the unit type
 * e.g. for Mass the base unit is gram's
 */
echo Mass::BASE_UNIT;
// PhpUnitConversion\Unit\Mass\Gram

/* Most units are linear related to the base unit by a fixed factor
 * For these units you can retrieve the factor by calling getFactor,
 * this can return false if no factor has been defined
 */
echo $milliGram->getFactor();
// 0.001

/* The base unit has no factor defined, this is because we use class constants
 * to define factors for SI prefixes and you can't extend/overwrite constants
 */
var_dump((new Mass\Gram(2))->getFactor());
// false
```

## Unit Conversions
```php
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Mass;

/* If you have an instantiated unit, you can convert to a new unit by calling the 
 * static `from` method on the unit you want to convert to 
 */
$grams = new Mass\Gram(21);
echo Mass\PennyWeight::from($grams)->format();
// 13.503 dwt

/* You can also call the `to` method on the unit object and pass the class name of 
 * the unit you want to convert to 
 */
$grams = new Mass\Gram(21);
$milliGram = $massUnit->to(Mass\MilliGram::class);
echo $milliGram->format(0);
// 21000 mg

/* or use an instantiated object, this will overwrite any existing value
 * due to php passing objects by reference there is no need for a left assignment this way 
 */
$grams = new Mass\Gram(21);
$kiloGram = new Mass\KiloGram;
$grams->to($kiloGram);
echo $kiloGram->format();
// 0.021 kg

/* but `to` also returns the object for left assignment
 */
$massUnit = new Mass\Gram(21);
$ounce = $massUnit->to(new Mass\Ounce);
echo $ounce->format();
// 0.741 oz

/* you can convert directly from a string which has a format of '<value><symbol>' 
 * by calling the static `from` method on the unit class
 */
$milliGrams = Unit::from('21 mg');
var_dump($milliGrams instanceof Mass\MilliGram::class)
// true

/* but if you already know which type of unit to expect, you can also call 
 * `from` directly on the unit type class. This could prevent errors when multiple units
 * exists with the same symbol
 */
$milliGrams = Mass::from('21 mg');
var_dump($milliGrams instanceof Mass\MilliGram::class)
// true
```

## Find the nearest unit type
If you have a value and want to automatically convert it to the unit type which value is closest to 1, you can use the static `nearest` method.
The `nearest` method should only be called on a Unit Type class.

```php
use PhpUnitConversion\Unit\Mass;
$value = rand(0, 1E13);
$unit = Mass::nearest($value);
echo $unit->format();
// 3.471 long cwt
```

If you only want units from a specific measurement system, you can pass a System class name as second parameter
```php
use PhpUnitConversion\System;
use PhpUnitConversion\Unit\Mass;

$gram = Mass\Gram(850);

/* Only Units from the Metric system */
$unit = Mass::nearest($value, System\Metric::class);
echo $unit->format();   
// 8.500 hg

/* Only Units from the USC / Imperial system */
$unit = Mass::nearest($value, System\USC::class);
echo $unit->format();   
// 1.874 lb
```

## Storing values with their type

If you want to store values in e.g. a database, you often have to store two things: the value itself and the unit type. As all our Units have a TYPE constant 
defined, we can use this to add the type information to the value before storing it in the database. To retrieve this unit value you can invoke the class instance itself.

```php
use PhpUnitConversion\Unit\Mass;
$kiloGrams = new Mass\KiloGrams(1);
echo $kiloGrams();
// 64001
```
The returned value is the result of first converting the value to the base value, then a shift left by 6 and add the TYPE constant.

You can use the static `from` method to convert to a base unit instance again:
```php
use PhpUnitConversion\Unit;
$grams = Unit::from(64001);
echo get_class($grams);
// PhpUnitConversion\Unit\Mass\Gram

$kiloGrams = $grams->to(Unit\Mass\KiloGram::class);
echo $kiloGrams->format();
// 1 kg
```

## Arithmetic Operators
```php
/* You can add units of the same type by calling `add` method with one or more units as arguments
 * add always returns a new instance
 */
$grams = new Mass\Gram(580);
$addGrams = $massUnit->add(new Mass\KiloGram(0.4), new Mass\Gram(11));
echo $addGrams->format(0);
// 991 g

/* You can also substract units of the same type by calling `substract` method with one or more units
 * as arguments. substract always returns a new instance
 */
$grams = new Mass\Gram(580);
$subGrams = $massUnit->substract(new Mass\KiloGram(0.4), new Mass\Gram(11));
echo $subGrams->format(0);
// 169 g

/* When you try to add/substract units of different types an exception is thrown
 */
$grams = new Mass\Gram(580);
$addGrams = $massUnit->add(new Time\Second(60) );
// throws a PhpUnitConversion\Exception\UnsupportedUnitException
```

## Contributing

Please check [Contributing](CONTRIBUTING.md) for details.
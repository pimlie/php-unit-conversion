# Php Unit Conversion

The `php-unit-conversion/php-unit-conversion` package provides full PSR-4 compatible unit conversion. Most other packages that are available for unit conversion are using `string` types to indicate unit types. In this package all unit types are classes.

We still need to add a lot more units and tests to make the package more usefull. If you want to help me with that, please check [Contributing](#contributing)!

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

/* If you have an instantiated unit, you can convert to a new unit by calling the static `from` method
 * on the unit you want to convert to 
 */
$grams = new Mass\Gram(21);
echo Mass\PennyWeight::from($grams)->format();
// 13.503 dwt

/* You can also call the `to` method on the unit object and pass the class name of the unit you want
 * to convert to 
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
As this package is still very much a work in progress, any help adding more unit's and unit tests is really appreciated!

A couple of things are important when submitting a Pull Request:
- Use the PSR-2 Coding Standard
- Add tests
- Use the method of implementation as described below

### Implementing Unit's and Unit Type's
#### Adding a new unit type
Start by defining a `TYPE_XXX` const in `Unit.php`. Give it the next/unique number of the TYPE_ sequence.

Next create a new unit type class in file `Unit/XXX.php`, this will hold the type description. All units belonging to this unit type 
should be (directly or indidrectly) extended from this class. Make sure you add `const TYPE = Unit::TYPE_XXX`. Also set the `const BASE_UNIT`
to the class of your base unit. Please choose your base unit logically, units from the metric system have preference over the 
imperial / usc systems.

Now create a folder `Unit/XXX/` in which we will place all the unit classes for this unit type, after this proceed with adding a base unit

#### Adding a base unit
We prefer the base unit to be a unit from the metric system. This way we can easily add all SI prefixed units by extending them from the base
unit and only implement a `PhpUnitConversion\Prefix\Metric\<SI_Prefix>` interface. E.g. the implementation of `Mass\MilliGram` is:
```php 
class MilliGram extends Gram implements Metric, Milli
{
}
```
See the comment above in [Basic Usage](#basic-usage) about the `FACTOR` constant. You should not set a `FACTOR` on the `BASE_UNIT`, otherwise the above implementation
will fail because the interface `Prefix\Metric\Milli` cannot overwrite an already defined class constant.

See `Gruntfile.js` for a quick way to add all prefixed classes to your unit.

#### Add an new unit to a unit type
When adding a unit `YYY` to unit type `XXX` start by creating the file `Unit/XXX/YYY.php`.

If your unit has a linear correspondence to the base unit, just set the class constant `FACTOR` to its correct value.
If your unit has an offset to the base unit, you can add a class constant `ADDITION`. 
(Conversion to the BASE_UNIT value is done by first applying the `FACTOR`, then adding the `ADDITION`)

Please also set the class constant `SYMBOL` and `LABEL`. When your unit does not have a `SYMBOL`, omit it or set it to an empty string. `LABEL` is often equal to your lower case classname.

#### Relative factors
It is possible to set factors on your unit which are not relative to the `BASE_UNIT` but to another unit. You should extend your new unit `ZZZ` from 
the existing unit `YYY` and include the `HasRelativeFactor` Trait in `ZZZ`. Due to class scopes in php you also have to add the `HasFactor` trait to
`YYY` to make sure we use the correct (late binding) static class constant.

See `Unit\Mass\Pound` (=`YYY`) and `Unit\Mass\Ounce` (=`ZZZ`) for an example:
```php
class AvoirdupoisPound extends Mass
{
    use HasFactor;
    
    const FACTOR = 453.59237; // FACTOR is relative to Mass\Gram, 453.6 Gram in a Pound
}

class Ounce extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 16; // FACTOR is relative to Mass\Pound, 16 Ounce in a Pound
}
```

#### System of Measurement
Please also implement the correct unit system interfaces for your unit:
```php
/* Metric units should implement the Metric interface
 * see https://en.wikipedia.org/wiki/Metric_system
 */
use PhpUnitConversion\System\Metric;

class YYY extends XXX implements Metric
{
 
/* Imperial units should implement the Imperial interface
 * see https://en.wikipedia.org/wiki/Imperial_units
 */
use PhpUnitConversion\System\Imperial;

/* US customary units should implement the USC interface
 * see https://en.wikipedia.org/wiki/United_States_customary_units
 */
use PhpUnitConversion\System\USC;

/* Some units like `feet` are used in more then one system, 
 * in that case implement both systems
 */
use PhpUnitConversion\System\Imperial;
use PhpUnitConversion\System\USC;

class Yard extends InternationalYard implements Imperial, USC
{
```

#### Adding Tests
Please also include tests for your new units or unit types.

At the least tests should be added for conversion to the base unit.

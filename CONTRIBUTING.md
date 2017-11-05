## Contributing
As this package is still very much a work in progress, any help adding more unit's and unit tests is really appreciated!

A couple of things are important when submitting a Pull Request:
- Use PSR-2 Coding Standard
- Add tests
- Use the method of implementation as described below

### Implementing Unit's and Unit Type's
#### Clone this repository
```
git clone https://github.com/pimlie/php-unit-conversion
cd php-unit-conversion
composer install
```

#### Adding a new unit type
Start by defining a `XXX` const in `UnitType.php`. Give it the next/unique number in the sequence.

Next create a new unit type class in file `Unit/XXX.php`, this will hold the type description. All units belonging to this unit type 
should be (directly or indidrectly) extended from this class. Make sure you add `const TYPE = UnitType::XXX`. Also set the `const BASE_UNIT`
to the class of your base unit. Please choose your base unit logically, units from the metric system have preference over the 
imperial / usc systems.

Now create a folder `Unit/XXX/` in which we will place all the unit classes for this unit type, after this proceed with adding a base unit

#### Adding a base unit
We prefer the base unit to be a unit from the SI and/or metric system. If your unit should use the SI prefixes, please use the `Gruntfile.js` for a 
quick way to add all prefixed classes to your unit.

#### Add an new unit to a unit type
When adding a unit `YYY` to unit type `XXX` start by creating the file `Unit/XXX/YYY.php`.

If your unit has a linear correspondence to the base unit, just set the class constant `FACTOR` to its correct value.
If your unit has an offset to the base unit, you can add a class constant `ADDITION_PRE` or `ADDITION_POST`. 
These correspond to the following formula: `BaseUnitValue = (ThisUnitValue + ADDITION_PRE) * FACTOR + ADDITION_POST`

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
    
    const FACTOR = 453.59237; // FACTOR is relative to Mass\Gram, 1 Avoirdupois Pound is 453.6 Gram
}

class Ounce extends Pound
{
    use HasRelativeFactor;
    
    const FACTOR = 1/16; // FACTOR is relative to Mass\Pound, 1 Ounce is 1/16 Pound (or 16 Ounce in a Pound)
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

#### Running tests
You can run tests either either by running:
```
composer test
```
or
```
vendor/bin/phpunit
```

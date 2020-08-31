# Units of Measure

This project collects some units of measure and encapsulates symbols and names in simple constant classes. Some behavior was added
to handle and interact with it in a more comfortable way.

In this version, the following measures were implemented:
- Time

You can download this project as follows.

```bash
git clone git@github.com:pleets/php-units-of-measure.git
```

# Usage

## Displaying Units and Symbols

You can get the name of a measure as follows

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

// second
$symbol = TimeUnit::fromSymbol(TimeSymbol::SECOND);

// month
$symbol = TimeUnit::fromSymbol(TimeSymbol::MONTH);
```

As the same way, you can get the symbol of a measure as follows

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;

// s
$symbol = TimeSymbol::fromUnit(TimeUnit::SECOND);

// h
$symbol = TimeSymbol::fromUnit(TimeUnit::HOUR);
```

## Grouping Units and Symbols

You can group as units as you need in the following way.

```php
use Pleets\Units\Units\TimeUnit;
use Pleets\Units\Units\TimeUnitSet;

$timeSet = new TimeUnitSet();
$timeSet->addUnit(TimeUnit::MINUTE);
$timeSet->addUnit(TimeUnit::HOUR);

// ['minute', 'hour']
$units = $timeSet->toArray();
```

As the same way, you can group as symbols as you need in the following way.

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Symbols\TimeSymbolSet;

$timeSet = new TimeSymbolSet();
$timeSet->addSymbol(TimeSymbol::MINUTE);
$timeSet->addSymbol(TimeSymbol::HOUR);

// ['min', 'h']
$symbols = $timeSet->toArray();
```
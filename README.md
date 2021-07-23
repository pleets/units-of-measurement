# Units of Measurement

This project collects some units of measurement and encapsulates symbols and names in simple constant classes. Some behavior was added
to handle and interact with it in a more comfortable way.

In this version, the following units were implemented:

- Time (s, m, h, ...)
- Information (B, KB, MB, ...)

# Installation

Use following command to install this library:

```bash
composer require pleets/units-of-measurement
```

# Usage

## Displaying Units and Symbols

You can get the name of a unit of measurement as follows

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;
use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Units\InformationUnit;

// second
$symbol = TimeUnit::fromSymbol(TimeSymbol::SECOND);

// kilobyte
$symbol = InformationUnit::fromSymbol(InformationSymbol::KILOBYTE);
```

As the same way, you can get the symbol of a unit measurement as follows

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\TimeUnit;
use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Units\InformationUnit;

// s
$symbol = TimeSymbol::fromUnit(TimeUnit::SECOND);

// KB
$symbol = InformationSymbol::fromUnit(InformationUnit::KILOBYTE);
```

## Grouping Units and Symbols

You can group as units as you need in the following way.

```php
use Pleets\Units\Units\TimeUnit;
use Pleets\Units\Units\Sets\TimeUnitSet;

$timeSet = new TimeUnitSet();
$timeSet->addUnit(TimeUnit::MINUTE);
$timeSet->addUnit(TimeUnit::HOUR);

// ['minute', 'hour']
$units = $timeSet->toArray();
```

As the same way, you can group as symbols as you need in the following way.

```php
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Symbols\Sets\TimeSymbolSet;

$timeSet = new TimeSymbolSet();
$timeSet->addSymbol(TimeSymbol::MINUTE);
$timeSet->addSymbol(TimeSymbol::HOUR);

// ['min', 'h']
$symbols = $timeSet->toArray();
```

## Conversions

You can convert between units using the main class of each unit.

```php
use Pleets\Units\Time;

$time = Time::fromUnit('minute', 5);

// 300s
$time->toMinutes()->toString();

// 300 seconds
$time->toString(false);
```


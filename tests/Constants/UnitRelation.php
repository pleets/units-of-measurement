<?php

namespace Tests\Constants;

use Pleets\Units\Symbols\InformationSymbol;
use Pleets\Units\Symbols\TimeSymbol;
use Pleets\Units\Units\InformationUnit;
use Pleets\Units\Units\TimeUnit;

interface UnitRelation
{
    public const UNITS = [
        TimeSymbol::class => [
            's' => 'second',
            'min' => 'minute',
            'h' => 'hour',
            'd' => 'day',
            'w' => 'week',
            'm' => 'month',
            'y' => 'year'
        ],
        InformationSymbol::class => [
            'B' => 'byte',
            'KB' => 'kilobyte',
            'MB' => 'megabyte',
            'GB' => 'gigabyte',
            'TB' => 'terabyte',
            'PB' => 'petabyte',
            'EB' => 'exabyte',
            'ZB' => 'zettabyte',
            'YB' => 'yottabyte'
        ]
    ];

    public const SYMBOLS = [
        TimeUnit::class => [
            'second' => 's',
            'minute' => 'min',
            'hour' => 'h',
            'day' => 'd',
            'week' => 'w',
            'month' => 'm',
            'year' => 'y'
        ],
        InformationUnit::class => [
            'byte' => 'B',
            'kilobyte' => 'KB',
            'megabyte' => 'MB',
            'gigabyte' => 'GB',
            'terabyte' => 'TB',
            'petabyte' => 'PB',
            'exabyte' => 'EB',
            'zettabyte' => 'ZB',
            'yottabyte' => 'YB'
        ]
    ];
}

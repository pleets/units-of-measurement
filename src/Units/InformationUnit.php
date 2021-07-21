<?php

namespace Pleets\Units\Units;

use Pleets\Units\Symbols\InformationSymbol;

class InformationUnit extends BaseUnit
{
    public const BYTE      = 'byte';
    public const KILOBYTE  = 'kilobyte';
    public const MEGABYTE  = 'megabyte';
    public const GIGABYTE  = 'gigabyte';
    public const TERABYTE  = 'terabyte';
    public const PETABYTE  = 'petabyte';
    public const EXABYTE   = 'exabyte';
    public const ZETTABYTE = 'zettabyte';
    public const YOTTABYTE = 'yottabyte';

    protected static function symbol(): string
    {
        return InformationSymbol::class;
    }
}

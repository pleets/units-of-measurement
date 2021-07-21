<?php

namespace Pleets\Units\Symbols;

use Pleets\Units\Units\InformationUnit;

class InformationSymbol extends BaseSymbol
{
    public const BYTE      = 'B';
    public const KILOBYTE  = 'KB';
    public const MEGABYTE  = 'MB';
    public const GIGABYTE  = 'GB';
    public const TERABYTE  = 'TB';
    public const PETABYTE  = 'PB';
    public const EXABYTE   = 'EB';
    public const ZETTABYTE = 'ZB';
    public const YOTTABYTE = 'YB';

    protected static function unit(): string
    {
        return InformationUnit::class;
    }
}

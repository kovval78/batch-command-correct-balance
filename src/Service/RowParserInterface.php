<?php
declare(strict_types=1);

namespace App\Service;

interface RowParserInterface
{
    public const COLUMN_NUMBER_AMOUNT = 1;
    public const COLUMN_NUMBER_CURRENCY = 2;
    public const COLUMN_NUMBER_REFERENCE = 5;

    public static function getAmount($line): string;

    public static function getCurrency($line): string;

    public static function getReference($line): string;
}
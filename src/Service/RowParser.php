<?php

declare(strict_types=1);

namespace App\Service;

class RowParser
{
    private const COLUMN_NUMBER_AMOUNT = 1;
    private const COLUMN_NUMBER_CURRENCY = 2;
    private const COLUMN_NUMBER_REFERENCE = 5;

    public static function getAmount(array $line): string
    {
        return str_replace([",", '"'], "", $line[self::COLUMN_NUMBER_AMOUNT]);
    }

    public static function getCurrency(array $line): string
    {
        return trim($line[self::COLUMN_NUMBER_CURRENCY]);
    }

    public static function getReference(array $line): string
    {
        return trim($line[self::COLUMN_NUMBER_REFERENCE]);
    }
}
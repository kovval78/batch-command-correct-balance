<?php

declare(strict_types=1);

namespace App\Service;

class StringParser
{
    private const COLUMN_NUMBER_AMOUNT = 1;
    private const COLUMN_NUMBER_CURRENCY = 2;
    private const COLUMN_NUMBER_REFERENCE = 5;

    static public function getAmount($line): string
    {
        return str_replace([",", '"'], "", $line[self::COLUMN_NUMBER_AMOUNT]);
    }

    static public function getCurrency($line): string
    {
        return trim($line[self::COLUMN_NUMBER_CURRENCY]);
    }

    static public function getReference($line): string
    {
        return trim($line[self::COLUMN_NUMBER_REFERENCE]);
    }
}
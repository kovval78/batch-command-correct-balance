<?php
declare(strict_types=1);

namespace App\Service;

interface RowParserInterface
{
    public static function getAmount($line): string;

    public static function getCurrency($line): string;

    public static function getReference($line): string;
}
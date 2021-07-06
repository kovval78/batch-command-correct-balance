<?php
declare(strict_types=1);

namespace App\Service;

interface ReadFileInterface
{
    public function readCsvFile(): array;
}
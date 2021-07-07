<?php

declare(strict_types=1);

namespace App\Service;

class ReadFileCsv implements ReadFileInterface
{
    private string $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function readCsvFile(): array
    {
        $content = [];
        if (($handle = fopen($this->fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000)) !== FALSE) {
                $content[] = $data;
            }
            fclose($handle);
        }

        var_dump($content);

        return $content;
    }
}
<?php

declare(strict_types=1);

namespace Tests\Service;

use App\Service\ReadFileCsv;
use PHPUnit\Framework\TestCase;

final class ReadFileCsvTest extends TestCase
{
    protected ReadFileCsv $readFileCsv;

    protected function setUp(): void
    {
        $this->readFileCsv = new ReadFileCsv('sample.csv');
    }

    public function testIsTheFileIsReadable(): void
    {
        $this->assertFileIsReadable('/home/kamil/PhpstormProjects/command/sample.csv');
    }

    public function testIsTheFileExists(): void
    {
        $this->assertFileExists('/home/kamil/PhpstormProjects/command/sample.csv');
    }

    public function testCountingAddingElementsToArray(): void
    {
        $content = [];
        $this->assertCount(0, $content);

        $content[] = ['234.5'];
        $this->assertCount(1, $content);
    }

    public function testDoesTheMethodReturnArrayWithTheCsvFile(): array
    {
        $expected = [];
        if (($handle = fopen('/home/kamil/PhpstormProjects/command/sample.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000)) !== FALSE) {
                $expected[] = $data;
            }
            fclose($handle);
        }

        $this->assertSame($expected, $this->readFileCsv->readCsvFile());


        return $expected;
    }
}

<?php

declare(strict_types=1);

namespace Tests\Service;

use App\Service\ContentProcessor;
use PHPUnit\Framework\TestCase;

final class ContentProcessorTest extends TestCase
{
    public function testIsItProcessesValidNewContent()
    {
        $content = [
            'Anisa Toland',
            '1,511.48',
            'GBP',
            'OF inv 16422449',
            'MPSS409759-R1799513',
            'IFX - TRADE - Payment cancelled - Anisa Toland - OF inv 16422449 - MPSS409759-R1799513 - sell GBP 1511.48 @ 1'
        ];

        $contentProcessor = new ContentProcessor();

        $result = $contentProcessor->process([$content]);

        $expected = 'bin/console cbs:command:correct-balance ffddb369-8b3b-4cb1-9501-6fa56201fe7c 231884 36488655 1511.48 GBP "IFX - TRADE - Payment cancelled - Anisa Toland - OF inv 16422449 - MPSS409759-R1799513 - sell GBP 1511.48 @ 1"' . PHP_EOL;

        $this->assertSame($expected, $result);
    }
}
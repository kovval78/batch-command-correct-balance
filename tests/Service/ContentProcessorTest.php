<?php

declare(strict_types=1);

namespace Tests\Service;

use App\Service\ContentProcessor;
use PHPUnit\Framework\TestCase;

final class ContentProcessorTest extends TestCase
{
    private ContentProcessor $contentProcessor;

    public function setUp(): void
    {
        parent::setUp();
        $this->contentProcessor = new ContentProcessor();
    }

    /**
     * @dataProvider contentProvider
     */
    public function testIsNewContentReturnsValidString()
    {
        $expected = 'bin/console cbs:command:correct-balance ffddb369-8b3b-4cb1-9501-6fa56201fe7c 231884 36488655 359.61 GBP "IFX - TRADE - Payment cancelled - Emma Stirk - OF inv 16322976 - MPSS408664-R1789872 - sell GBP 359.61 @ 1"';
        $content =;

        $this->assertSame($expected, $this->contentProcessor->process($content));
    }

    public function contentProvider(): array
    {
        return [
            [
                [0] => "Beneficiary",
                [1] => "Amount",
                [2] => "CCY",
                [3] => "Reference",
                [4] => "Ticket Number",
                [5] => "Reference"
            ]
        ];
    }

}

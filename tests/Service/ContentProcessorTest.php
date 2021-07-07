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
    public function testIsNewContentReturnsValidString($content)
    {
        $expected = 'bin/console cbs:command:correct-balance ffddb369-8b3b-4cb1-9501-6fa56201fe7c 231884 36488655 Amount CCY "Reference"';

        $this->assertSame($expected, $this->contentProcessor->process($content));
    }

    public function contentProvider(): array
    {
        return array(
            "Beneficiary",
            "Amount",
            "CCY",
            "Reference",
            "Ticket Number",
            "Reference"
        );
    }

}

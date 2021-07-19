<?php

declare(strict_types=1);

namespace Tests\Service;

use App\Service\RowParser;
use PHPUnit\Framework\TestCase;

final class RowParserTest extends TestCase
{
    protected RowParser $parser;

    protected function setUp(): void
    {
        $this->parser = new RowParser();
    }

    /**
     * @dataProvider rowProvider
     */
    public function testDoesTheMethodReturnStringReplaced($input): void
    {
        $expected = "1511.48";

        $this->assertSame($expected, $this->parser->getAmount($input));
    }

    /**
     * @dataProvider rowProvider
     */
    public function testDoesTheMethodReturnTrimmedStringFromThirdColumn($input): void
    {
        $expected = 'GBP';

        $this->assertSame($expected, $this->parser->getCurrency($input));
    }

    /**
     * @dataProvider rowProvider
     */
    public function testDoesTheMethodReturnTrimmedStringFromFifthColumn($input): void
    {
        $expected = 'IFX - TRADE - Payment cancelled - Anisa Toland - OF inv 16422449 - MPSS409759-R1799513 - sell GBP 1511.48 @ 1';

        $this->assertSame($expected, $this->parser->getReference($input));
    }

    /**
     * @codeCoverageIgnore
     */
    public function rowProvider(): array
    {
        return [
            [
                [
                    'Anisa Toland',
                    '1,511.48',
                    'GBP',
                    'OF inv 16422449',
                    'MPSS409759-R1799513',
                    'IFX - TRADE - Payment cancelled - Anisa Toland - OF inv 16422449 - MPSS409759-R1799513 - sell GBP 1511.48 @ 1'
                ]
            ]
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Service;

class ContentProcessor implements ContentProcessorInterface
{
    public function process(array $content): string
    {
        $rowParser = new RowParser();

        $newContent = '';
        foreach ($content as $row) {
            $amount = $rowParser->getAmount($row);
            $currency = $rowParser->getCurrency($row);
            $reference = $rowParser->getReference($row);
            $newContent .= sprintf("bin/console cbs:command:correct-balance ffddb369-8b3b-4cb1-9501-6fa56201fe7c 231884 36488655 %s %s \"%s\"",
                $amount,
                $currency,
                $reference
            );
            $newContent .= PHP_EOL;
        }

        return $newContent;
    }
}
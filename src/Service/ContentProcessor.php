<?php

declare(strict_types=1);

namespace App\Service;

Class ContentProcessor implements ContentProcessorInterface
{
    public function process(array $content): string
    {
        $newContent = '';
        foreach($content as $row)
        {
            $amount = RowParser::getAmount($row);
            $currency = RowParser::getCurrency($row);
            $reference = RowParser::getReference($row);
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
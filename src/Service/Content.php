<?php

declare(strict_types=1);

namespace App\Services;

Class Content
{
    public function process(array $content): string
    {
        $newContent = '';
        foreach($content as $row)
        {
            $amount = StringParser::getAmount($row);
            $currency = StringParser::getCurrency($row);
            $reference = StringParser::getReference($row);
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
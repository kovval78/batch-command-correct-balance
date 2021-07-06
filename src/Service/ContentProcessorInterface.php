<?php
declare(strict_types=1);

namespace App\Service;

interface ContentProcessorInterface
{
    public function process(array $content): string;
}
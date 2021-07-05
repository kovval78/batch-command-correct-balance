<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\Content;
use App\Service\ReadFile;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Exception;

class ChangeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('cbs:command:correct-balance')
            ->setDescription('Add quotes to the column "Reference"')
            ->addArgument('filename', InputArgument::REQUIRED, 'File name');

            parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputFile = new ReadFile($input->getArgument('filename'));
        $content = $inputFile->readCsvFile();
        $contentObj = new Content();

        $newContent = $contentObj->process($content);

        try {
            $output->writeln($newContent);

        } catch (Exception $exception) {
            $output->writeln($exception->getMessage());
        }

        return Command::SUCCESS;
    }
}
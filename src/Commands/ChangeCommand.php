<?php

namespace App\Commands;

use App\Classes\Content;
use App\Classes\ReadFile;
use App\Classes\StringParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;

class ChangeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('cbs:command:correct-balance')
            ->setDescription('Add quotes to field "Reference"')
            ->addArgument('filename', InputArgument::OPTIONAL, 'File name');

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

        } catch (RuntimeException $exception) {
            $output->writeln($exception->getMessage());
        }
        return Command::SUCCESS;
    }
}
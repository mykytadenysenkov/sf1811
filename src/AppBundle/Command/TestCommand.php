<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use AppBundle\Service\BookExportManager;

class TestCommand extends Command
{
    const COMMAND_NAME = 'app:test';
    const COMMAND_DESCRIPTION = 'Test command';
    const COMMAND_HELP = 'Test command';
    
    private $bookExportManager;
    
    private $doctrine;
    
    public function __construct(BookExportManager $bookExportManager, $doctrine)
    {
        $this->bookExportManager = $bookExportManager;
        $this->doctrine = $doctrine;
        
        parent::__construct();
    }
    
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription(self::COMMAND_DESCRIPTION)
            ->setHelp(self::COMMAND_HELP)
            ->addArgument('arg1', InputArgument::REQUIRED, 'Test arg1')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arg1 = $input->getArgument('arg1');
        $book = $this
            ->doctrine
            ->getRepository('AppBundle:Book')
            ->find($arg1)
        ;
        
        $this->bookExportManager->exportToFile($book);
        
        // $output->writeln(['Hello', 123]);
    }
}
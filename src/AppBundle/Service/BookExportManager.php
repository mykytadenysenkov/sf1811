<?php

namespace AppBundle\Service;

use AppBundle\Entity\Book;

class BookExportManager
{
    private $destinationDir; // 'export'
    
    private $rootDir; // '/home/ubuntu/workspace/app'
    
    private $logger;
    
    public function __construct($logger, $rootDir, $destinationDir)
    {
        $this->logger = $logger;
        $this->destinationDir = $destinationDir;
        $this->rootDir = $rootDir;
    }
    
    public function exportToFile(Book $book)
    {
        $this->logger->info('Starting to export book ' . $book->getId());
        $text = $book->getTitle() . PHP_EOL . $book->getDescription();
        
        $file_put_contents(
            $this->getPath() . $this->getFilename($book),
            $text
        );
        
        $this->logger->info('Finished to export book ' . $book->getId());
    }
    
    private function getPath()
    {
        return "{$this->rootDir}/../web/{$this->destinationDir}/";
    }
    
    private function getFilename(Book $book)
    {
        return 'book_export_' . $book->getId() . '_' . time() . '.txt';
    }
}
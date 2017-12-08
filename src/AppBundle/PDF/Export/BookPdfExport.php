<?php

namespace AppBundle\PDF\Export;

use AppBundle\PDF\PdfExportInterface;

class BookPdfExport implements PdfExportInterface
{
    public function exportItem($object)
    {
        $pdf = new \FPDF();
        $pdf->addPage();
        // ...$pdf->output('F');
    }
    
    public function exportCollection(array $objects)
    {
        
    }
}
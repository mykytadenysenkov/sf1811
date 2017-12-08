<?php

namespace AppBundle\PDF;

interface PdfExportInterface
{
    public function exportItem($object);
    public function exportCollection(array $objects);
}
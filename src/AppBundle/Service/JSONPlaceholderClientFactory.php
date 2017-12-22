<?php

namespace AppBundle\Service;

class JSONPlaceholderClientFactory
{
    public function getGuzzleClient()
    {
        return new \GuzzleHttp\Client();
    }
}
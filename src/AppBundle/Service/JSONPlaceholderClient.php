<?php

namespace AppBundle\Service;

class JSONPlaceholderClient
{
    const BASE_URL = 'https://jsonplaceholder.typicode.com';
    
    private $guzzleClient;
    
    private $factory;
    
    public function __construct(JSONPlaceholderClientFactory $factory)
    {
        $this->factory = $factory;
        $this->guzzleClient = $factory->getGuzzleClient();
    }
    
    public function getPosts()
    {
        // thorws exception if not success
        $res = $this->get('/posts');
        
        return json_decode($res->getBody()->getContents());
    }
    
    public function getPost($id)
    {
        $res = $this->get('/posts/' . $id);
        
        return json_decode($res->getBody()->getContents());
    }
    
    private function get($resourseUrl)
    {
        return $this->guzzleClient->request('GET', self::BASE_URL . $resourseUrl);
    }
}
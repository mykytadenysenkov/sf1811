<?php

namespace AppBundle\Twig;

class TestExtension extends \Twig_Extension
{
    
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('lipsum', [$this, 'generate_lipsum']),
        );
    }
    
    public function generate_lipsum()
    {
        return 'hello new function';
    }
    
    public function getName()
    {
        return 'app.twig.test';
    }
}
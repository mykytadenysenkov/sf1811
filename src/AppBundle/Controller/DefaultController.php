<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $name = 'Bob';
        
        return ['name' => $name];
    }
    
    /**
     * @Route("/feedback", name="feedback")
     * @Template()
     */
    public function feedbackAction(Request $request)
    {
        $form = 'Here will be the form';
        
        return ['form' => $form];
    }
}

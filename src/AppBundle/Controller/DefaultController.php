<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $name = 'Bob';
        
        return $this->render('AppBundle:Default:index.html.twig', [
            'name' => $name
        ]);
    }
    
    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction(Request $request)
    {
        $form = 'Here will be the form';
        
        return $this->render('AppBundle:Default:feedback.html.twig', [
            'form' => $form
        ]);
    }
}

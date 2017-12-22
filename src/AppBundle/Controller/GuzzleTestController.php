<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * https://jsonplaceholder.typicode.com/
 * 
 * @Route("/json-placeholder")
 */ 
class GuzzleTestController extends Controller
{
    /**
     * @Route("/index", name="apitest_index")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this
            ->get('app.jsonplaceholder.client')
            ->getPosts()
        ;

        return ['posts' => $posts];
    }
    
    /**
     * @Route("/show/{id}", name="apitest_post")
     * @Template()
     */
    public function showAction($id)
    {
        $post = $this
            ->get('app.jsonplaceholder.client')
            ->getPost($id)
        ;

        return ['post' => $post];
    }
}

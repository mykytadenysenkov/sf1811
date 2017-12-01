<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/admin")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin_homepage")
     * @Template()
     */
    public function indexAction()
    {
        $name = 'Bob admin';
        
        return ['name' => $name];
    }
}

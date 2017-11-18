<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
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
        $feedback = new Feedback();
        $feedback->setIpAddress($request->getClientIp());
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
        
            $em->persist($feedback);
            $em->flush();
            
            $this->addFlash('fail', 'WRONG');
            $this->addFlash('success', 'Message saved');
            return $this->redirectToRoute('feedback'); // RedirectResponse
        }
        
        return ['feedback_form' => $form->createView()];
    }
}

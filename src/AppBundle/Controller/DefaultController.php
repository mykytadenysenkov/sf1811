<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedbackType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $form->add('submit', SubmitType::class);
        
        $form->handleRequest($request);
        
        
        // example
        // $errors = [];
        // foreach ($form as $fieldName => $formField) {
        //     // each field has an array of errors
        //     $errors[$fieldName] = $formField->getErrors();
        // }
        
        // dump($errors);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
        
            $em->persist($feedback);
            $em->flush();
            
            $this->addFlash('success', 'Message saved');
            return $this->redirectToRoute('feedback'); // RedirectResponse
        }
        
        return ['feedback_form' => $form->createView()];
    }
}

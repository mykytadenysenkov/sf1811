<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/admin", name="book_list")
 * @Template()
 */
class BookController extends Controller
{
    /**
     * @Route("/book/create", name="admin_book_create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(BookType::class);
        $form->add('submit', SubmitType::class);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->get('doctrine.orm.default_entity_manager');
           $book = $form->getData();
           
           $em->persist($book);
           $em->flush();
        }   
        
        return ['book_form' => $form->createView()];
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Book;

class BookController extends Controller
{
    /**
     * @Route("/books", name="book_list")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $books = $this
            ->getRepository()
            ->findAll()
        ;
        
        return ['books' => $books];
    }
    
    /**
     * @Route("/books/{id}", name="book_item", requirements={"id":"[0-9]+"})
     * @Template()
     */
    public function showAction($id, Request $request)
    {
        $book = $this
            ->getRepository()
            ->find($id)
        ;
        
        if (!$book) {
            throw $this->createNotFoundException('D\'oh! Book not found');
        }
        
        return ['book' => $book];
    }
    
    private function getRepository()
    {
        return $this
            ->getDoctrine()
            ->getRepository('AppBundle:Book');
    }
}

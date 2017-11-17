<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/books", name="book_list")
     */
    public function indexAction(Request $request)
    {
        $books = [1 => 'book 1', 'book 2'];
        
        return $this->render('AppBundle:Book:index.html.twig', [
            'books' => $books
        ]);
    }
    
    /**
     * @Route("/books/{id}", name="book_item", requirements={"id":"[0-9]+"})
     */
    public function showAction($id)
    {
        $book = 'Here will be the book ' . $id;
        
        return $this->render('AppBundle:Book:show.html.twig', [
            'book' => $book
        ]);
    }
}

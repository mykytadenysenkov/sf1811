<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/books", name="book_list")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $books = [1 => 'book 1', 'book 2'];
        
        return ['books' => $books];
    }
    
    /**
     * @Route("/books/{id}", name="book_item", requirements={"id":"[0-9]+"})
     * @Template()
     */
    public function showAction($id)
    {
        $book = 'Here will be the book ' . $id;
        
        return ['book' => $book];
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    
    /**
     * @Route("/api/books/{id}", name="book_item_api", requirements={"id":"[0-9]+"})
     */
    public function getBookApiAction($id)
    {
        // dz: get 500, 404 json if errors
        $book = $this
            ->getRepository()
            ->find($id)
        ;
        
        if (!$book) {
            throw $this->createNotFoundException('D\'oh! Book not found');
        }
        
        $data = [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'price' => $book->getPrice(),
            'category' => [
                'id' => $book->getCategory()->getId(),
                'name' => $book->getCategory()->getName(),
            ]
        ];
        
        return new JsonResponse($data);
    }
    
    private function getRepository()
    {
        return $this
            ->getDoctrine()
            ->getRepository('AppBundle:Book');
    }
}

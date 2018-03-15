<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
	use \App\Traits\Category;

	/**
     * @Route("/", name="home")
     */
    public function index()
    {
    	$posts = $this->getDoctrine()
	                  ->getRepository(Post::class)
	                  ->findAll();

    	$categories = $this->getCategories($this->getDoctrine());

        return $this->render('site/home.html.twig', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * @Route("/{slug}", name="single")
     */
    public function single($slug)
    {
    	$post = $this->getDoctrine()
	                  ->getRepository(Post::class)
	                  ->findOneBySlug($slug);

	    $categories = $this->getCategories($this->getDoctrine());

	    return $this->render('site/single.html.twig', ['post' => $post, 'categories' => $categories]);
    }
}

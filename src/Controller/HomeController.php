<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
	use \App\Traits\Category;

	/**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
    	$posts = $this->getDoctrine()
	                  ->getRepository(Post::class)
	                  ->findAll();

    	$paginator = $this->get('knp_paginator');
    	$posts = $paginator->paginate($posts, $request->query->getInt('page', 1), 2);

    	$categories = $this->getCategories($this->getDoctrine());

        return $this->render('site/home.html.twig', ['posts' => $posts, 'categories' => $categories]);
    }



	/**
	 * @Route("/search", name="search")
	 */
	public function search(Request $request)
	{
	    $term = $request->query->get('term');

		$posts = $this->getDoctrine()
		              ->getRepository(Post::class)
		              ->searchPost($term);

		$paginator = $this->get('knp_paginator');
		$posts = $paginator->paginate($posts, $request->query->getInt('page', 1), 2);

		$categories = $this->getCategories($this->getDoctrine());

		return $this->render('site/search.html.twig',
			['posts' => $posts, 'categories' => $categories, 'term' => $term]);
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

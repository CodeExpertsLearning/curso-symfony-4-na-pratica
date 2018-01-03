<?php

namespace App\Controller;

use App\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
    	$posts = $this->getDoctrine()
	                  ->getRepository(Post::class)
	                  ->findAll();

    	var_dump($posts);
        return new Response('Seja Bem Vindo ao Blog Sf4!');
    }
}

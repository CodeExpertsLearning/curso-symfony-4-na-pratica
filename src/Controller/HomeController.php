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

        return $this->render('site/home.html.twig');
    }
}

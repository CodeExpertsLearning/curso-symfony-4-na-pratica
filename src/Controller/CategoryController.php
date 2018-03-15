<?php

namespace App\Controller;

use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
	use \App\Traits\Category;
    /**
     * @Route("/category/{slug}", name="category_site")
     */
    public function index($slug)
    {
		$category = $this->getDoctrine()
					 ->getRepository(Category::class)
			         ->findOneBySlug($slug);

	    $categories = $this->getCategories($this->getDoctrine());

	    return $this->render('site/category.html.twig', ['category' => $category, 'categories' => $categories]);
    }
}

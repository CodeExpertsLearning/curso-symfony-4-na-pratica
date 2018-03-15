<?php
namespace App\Traits;

use App\Entity\Category as C;

trait Category
{
	private function getCategories($doctrine)
	{

		$categories = $doctrine
			->getRepository(C::class)
			->findAll();

		return $categories;
	}
}
<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @ORM\Column(type="string")
	 */
	private $description;

	/**
	 * @ORM\Column(type="string")
	 */
	private $slug;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;

	/**
	 * @ORM\ManyToMany(targetEntity="Post", inversedBy="categoryCollection")
	 * @ORM\JoinTable(name="categories_posts")
	 */
	private $postCollection;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): Category
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description): Category
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param mixed $slug
	 */
	public function setSlug($slug): Category
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * @param mixed $createdAt
	 */
	public function setCreatedAt($createdAt): Category
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * @param mixed $updatedAt
	 */
	public function setUpdatedAt($updatedAt): Category
	{
		$this->updatedAt = $updatedAt;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPostCollection()
	{
		return $this->postCollection;
	}

	/**
	 * @param mixed $postCollection
	 */
	public function setPostCollection($postCollection): Category
	{
		$this->postCollection = $postCollection;
		return $this;
	}

	public function __toString()
	{
		return $this->name;
	}

}

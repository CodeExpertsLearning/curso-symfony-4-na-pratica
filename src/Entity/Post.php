<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $title;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $description;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank()
	 */
	private $content;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 */
	private $slug;

	/**
	 * @ORM\Column(type="boolean")
	 * @Assert\NotBlank()
	 */
	private $status;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;

	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="postCollection")
	 */
	private $author;

	/**
	 * @ORM\ManyToMany(targetEntity="Category", mappedBy="postCollection")
	 */
	private $categoryCollection;

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
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title ): Post
	{
		$this->title = $title;
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
	public function setDescription( $description ): Post
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent( $content ): Post
	{
		$this->content = $content;
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
	public function setSlug( $slug ): Post
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus( $status ): Post
	{
		$this->status = $status;
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
	public function setCreatedAt( $createdAt ): Post
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
	 * @return Post
	 */
	public function setUpdatedAt( $updatedAt ): Post
	{
		$this->updatedAt = $updatedAt;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * @param mixed $author
	 */
	public function setAuthor( $author ): Post
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryCollection()
	{
		return $this->categoryCollection;
	}

	/**
	 * @param mixed $categoryCollection
	 */
	public function setCategoryCollection(Category $categoryCollection): Post
	{
		$this->categoryCollection = $categoryCollection;
		return $this;
	}

	public function __toString()
	{
		return $this->title;
	}

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\Column(name="first_name", type="string")
	 * @Assert\NotBlank()
	 */
	private $firstName;

	/**
	 * @ORM\Column(name="last_name", type="string")
	 *
	 * @Assert\NotBlank()
	 */
	private $lastName;

	/**
	 * @ORM\Column(type="string")
	 *
	 * @Assert\NotBlank()
	 * @Assert\Email(message="Este email {{ value }} não é válido")
	 */
	private $email;

	/**
	 * @ORM\Column(type="string")
	 *
	 * @Assert\NotBlank()
	 */
	private $username;

	/**
	 * @ORM\Column(type="string")
	 *
	 * @Assert\NotBlank()
	 */
	private $password;

	/**
	 * @ORM\Column(name="created_at", type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(name="updated_at", type="datetime")
	 */
	private $updatedAt;

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
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param mixed $firstName
	 */
	public function setFirstName( $firstName ): User
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param mixed $lastName
	 */
	public function setLastName( $lastName ): User
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $email ): User
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername( $username ): User
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): User
	{
		$this->password = $password;

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
	public function setCreatedAt( $createdAt ): User
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
	public function setUpdatedAt( $updatedAt ): User
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}
}

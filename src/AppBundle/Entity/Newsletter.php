<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="newsletter")
 */
class Newsletter
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var string
	 * 
	 * @ORM\Column(type="string")
	 * @Assert\Email
	 */
	private $email;
	
	/**
	 * @var string
	 * 
	 * @ORM\Column(type="string")
	 */
	private $ip;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime")
	 */
	private $registeredAt;
	
	function getId() {
		return $this->id;
	}

	function getEmail() {
		return $this->email;
	}

	function getIp() {
		return $this->ip;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setIp($ip) {
		$this->ip = $ip;
	}
	
	function getRegisteredAt() {
		return $this->registeredAt;
	}

	function setRegisteredAt(\DateTime $registeredAt) {
		$this->registeredAt = $registeredAt;
	}

}
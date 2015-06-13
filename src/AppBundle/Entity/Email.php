<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="newsletter")
 */
class Email extends BaseUser
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
	 */
	private $email;
	
	/**
	 * @var string
	 * 
	 * @ORM\Column(type="string")
	 */
	private $ip;

    public function __construct()
    {
        parent::__construct();
    }
}
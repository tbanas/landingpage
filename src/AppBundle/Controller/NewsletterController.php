<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/newsletter")
 */
class NewsletterController extends Controller
{
    /**
     * @Route("/", name="newsletter")
	 * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

	/**
	 * @Route("/", name="homepage")
	 * @Template()
	 */
	public function indexAction() {
		$form = $this->get('create_create_form')->createCreateForm(null);

		return array(
			'form' => $form->createView()
		);
	}

}

<?php

namespace AppBundle\Utils;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Router;
use AppBundle\Entity\Newsletter;
use AppBundle\Form\NewsletterType;

class NewsletterFormHelper {
	
	protected $formFactory;
	protected $router;
	
	public function __construct(FormFactoryInterface $formFactory, Router $router)
    {
        $this->formFactory = $formFactory;
		$this->router = $router;
    }
	
	function createCreateForm(Newsletter $entity = null) {
		$form = $this->formFactory->create(new NewsletterType(), $entity, array(
			'action' => $this->router->generate('newsletter_create'),
			'method' => 'POST'
		));

		$form->add('submit', 'submit', array('label' => 'Zapisz się'));

		return $form;
	}

}

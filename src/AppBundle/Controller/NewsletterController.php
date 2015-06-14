<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Newsletter;
use AppBundle\Form\NewsletterType;
use DateTime;

/**
 * @Route("/newsletter")
 */
class NewsletterController extends Controller {

	/**
	 * @Route("/", name="newsletter")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$entities = $em->getRepository('AppBundle:Newsletter')->findAll();
		
		return array(
			'entities' => $entities
		);
	}

	/**
	 * @Route("/", name="newsletter_create")
	 * @Method("POST")
	 * @Template("AppBundle:Newsletter:new.html.twig")
	 */
	public function createAction(Request $request) {
		$entity = new Newsletter();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();

			$exists = false;

			$newsletter = $em->getRepository('AppBundle:Newsletter')->findOneByEmail($form['email']->getData());

			if ($newsletter) {
				$exists = true;
			}

			$clientIp = $request->getClientIp();
			$existingIp = $em->getRepository('AppBundle:Newsletter')->findOneByIp($clientIp);

			if ($existingIp) {
				$exists = true;
			}

			if (!$exists) {
				$entity->setIp($clientIp);
				$entity->setRegisteredAt(new DateTime('NOW'));
				$em->persist($entity);
				$em->flush();

				$request->getSession()->getFlashBag()->add('message', "Email został dodany do listy mailingowej.");

				return $this->redirect($this->generateUrl('newsletter'));
			} else {
				$request->getSession()->getFlashBag()->add('alert', "Podany użytkownik został już dodany.");
			}
		}

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

	private function createCreateForm(Newsletter $entity) {
		$form = $this->get('create_create_form')->createCreateForm($entity);

		$form->add('submit', 'submit', array('label' => 'Zapisz się'));

		return $form;
	}

	/**
	 * @Route("/new", name="newsletter_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction() {
		$entity = new Newsletter();
		$form = $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form' => $form->createView(),
		);
	}

}

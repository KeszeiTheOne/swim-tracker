<?php


namespace App\Swim\UseCase\AddSwim\Controller;


use App\Swim\Entity\Swim;
use App\User\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AddSwimController extends AbstractController {

	public function index(Request $httpRequest) {
		$form = $this->createForm(AddSwimType::class);
		$form->handleRequest($httpRequest);

		if (!$form->isSubmitted() || !$form->isValid()) {
			return $this->render("swim/add.html.twig", [
				"form" => $form->createView(),
			]);
		}
		/** @var Swim $swim */
		$swim = $form->getData();
		$manager =$this->getDoctrine()
			 ->getManager();

		/** @var User $user */
		$user = $this->getUser();
		$swim->setUser($user);
		$swim->setBirthDateAtTime($user->getBirthDate());
		$swim->setHeightAtTime($user->getHeight());
		$swim->setWeightAtTime($user->getWeight());
		$manager->persist($swim);
		$manager->flush();
		
		return $this->redirectToRoute("list_swims");

	}

}
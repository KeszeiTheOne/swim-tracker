<?php


namespace App\Swim\UseCase\UpdateSwim\Controller;


use App\Swim\Entity\Swim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateSwimController extends AbstractController {

	public function index(Request $request) {
		$swim = $this->findSwim($request->attributes->get("id"));

		if (null === $swim) {
			throw new NotFoundHttpException();
		}
		$form = $this->createForm(UpdateSwimType::class, $swim);
		$form->handleRequest($request);

		if (!$form->isSubmitted() || !$form->isValid()) {
			return $this->render("swim/update.html.twig", [
				"form" => $form->createView(),
				"swim" => $swim
			]);
		}

		$manager = $this->getDoctrine()
						->getManager();

		$manager->persist($swim);
		$manager->flush();

		return $this->redirectToRoute("show_swim", ["id" => $swim->getId()]);
	}

	/**
	 * @param $id
	 * @return Swim|null
	 */
	private function findSwim($id) {
		return $this->getDoctrine()
					->getRepository(Swim::class)
					->findOneBy([
						"id"   => $id,
						"user" => $this->getUser(),
					]);
	}

}
<?php


namespace App\Swim\UseCase\RemoveSwim\Controller;


use App\Swim\Entity\Swim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RemoveSwimController extends AbstractController {

	public function index(Request $request) {
		$swim = $this->getDoctrine()
					 ->getRepository(Swim::class)
					 ->findOneBy([
						 "id"   => $request->attributes->get("id"),
						 "user" => $this->getUser(),
					 ]);

		if (null === $swim) {
			throw new NotFoundHttpException();
		}

		$manager = $this->getDoctrine()
						->getManager();
		$manager->remove($swim);
		$manager->flush();

		return $this->redirectToRoute("list_swims");
	}

}
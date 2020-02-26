<?php


namespace App\Swim\UseCase\ShowSwim\Controller;


use App\Swim\Entity\Swim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowSwimController extends AbstractController {

	public function index(Request $request) {
		$swim = $this->findSwim($request->attributes->get("id"));

		if (null === $swim) {
			throw new NotFoundHttpException();
		}

		return $this->render("swim/show.html.twig", [
			"swim" => $swim
		]);
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
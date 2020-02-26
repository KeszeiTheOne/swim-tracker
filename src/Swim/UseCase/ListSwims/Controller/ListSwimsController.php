<?php


namespace App\Swim\UseCase\ListSwims\Controller;


use App\Swim\Entity\Swim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ListSwimsController extends AbstractController {

	public function index(Request $httpRequest) {
		$swims = $this->getDoctrine()
					  ->getRepository(Swim::class)
					  ->findBy(["user" => $this->getUser()]);

		return $this->render("swim/list.html.twig", [
			"swims" => $swims,
		]);
	}

}
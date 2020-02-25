<?php


namespace App\Swim\UseCase\ListSwims\Controller;


use App\Swim\Entity\Swim;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ListSwimsController extends AbstractController {

	public function index(Request $httpRequest) {
		$swims = $this->getDoctrine()
					  ->getRepository(Swim::class)
					  ->findAll();

		return $this->render("swim/list.html.twig", [
			"swims" => $swims,
		]);
	}

}
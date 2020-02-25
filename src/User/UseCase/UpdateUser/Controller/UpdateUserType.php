<?php


namespace App\User\UseCase\UpdateUser\Controller;


use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class UpdateUserType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add("weight",IntegerType::class);
		$builder->add("height",IntegerType::class);
		$builder->add("birthDate",DateType::class,[
			"years" => range(1900, (new \DateTime("today + 5 year"))->format("Y"))
		]);
	}

	public function getParent() {
		return ProfileFormType::class;
	}

}
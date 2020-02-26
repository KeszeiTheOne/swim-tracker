<?php


namespace App\User\UseCase\RegisterUser\Controller;


use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterUserType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add("weight", IntegerType::class);
		$builder->add("height", IntegerType::class);
		$builder->add("birthDate", DateType::class, [
			"html5"  => false,
			"widget" => "single_text",
		]);
	}

	public function getParent() {
		return RegistrationFormType::class;
	}

}
<?php


namespace App\Swim\UseCase\UpdateSwim\Controller;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateSwimType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add("lengthOfPool", ChoiceType::class, [
			"choices" => [
				25 => 25,
				50 => 25,
			],
		]);
		$builder->add("laps", IntegerType::class);
		$builder->add("duration", IntegerType::class);
		$builder->add("heightAtTime", IntegerType::class);
		$builder->add("weightAtTime", IntegerType::class);
		$builder->add("swimAt", DateTimeType::class, [
			"html5"  => false,
			"widget" => "single_text",
			"format" => "yyyy-MM-dd HH:mm",
		]);
	}

	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults([
			"data_class" => "App\Swim\Entity\Swim",
		]);
	}

}
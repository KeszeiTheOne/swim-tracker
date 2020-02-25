<?php


namespace App\User\Entity;


use DateTime;
use FOS\UserBundle\Model\User as FOSUser;

class User extends FOSUser {

	/**
	 * @var int
	 */
	private $weight;

	/**
	 * @var int
	 */
	private $height;

	/**
	 * @var DateTime
	 */
	private $birthDate;

	public function getBirthDate() {
		return $this->birthDate;
	}

	public function setBirthDate(DateTime $birthDate): User {
		$this->birthDate = $birthDate;
		return $this;
	}

	public function getWeight() {
		return $this->weight;
	}

	public function setWeight(int $weight): User {
		$this->weight = $weight;
		return $this;
	}

	public function getHeight() {
		return $this->height;
	}

	public function setHeight(int $height): User {
		$this->height = $height;
		return $this;
	}



}
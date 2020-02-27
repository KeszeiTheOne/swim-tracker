<?php


namespace App\Swim\Entity;


use App\User\Entity\User;
use DateTime;

class Swim {

	private $id;

	/**
	 * @var User
	 */
	private $user;

	/**
	 * @var DateTime
	 */
	private $createdAt;

	/**
	 * @var DateTime
	 */
	private $swimAt;

	/**
	 * @var int
	 */
	private $lengthOfPool;

	/**
	 * @var int
	 */
	private $laps;

	/**
	 * @var int
	 */
	private $duration;

	/**
	 * @var int
	 */
	private $weightAtTime;

	/**
	 * @var int
	 */
	private $heightAtTime;

	/**
	 * @var DateTime
	 */
	private $birthDateAtTime;

	public function __construct() {
		$this->createdAt = new DateTime();
	}

	public function getId() {
		return $this->id;
	}

	public function getUser(): User {
		return $this->user;
	}

	public function setUser(User $user): Swim {
		$this->user = $user;
		return $this;
	}

	public function getSwimAt() {
		return $this->swimAt;
	}

	public function setSwimAt($swimAt): Swim {
		$this->swimAt = $swimAt;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLengthOfPool() {
		return $this->lengthOfPool;
	}

	/**
	 * @param int $lengthOfPool
	 * @return Swim
	 */
	public function setLengthOfPool($lengthOfPool): Swim {
		$this->lengthOfPool = $lengthOfPool;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLaps() {
		return $this->laps;
	}

	/**
	 * @param int $laps
	 * @return Swim
	 */
	public function setLaps($laps): Swim {
		$this->laps = $laps;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * @param int $duration
	 * @return Swim
	 */
	public function setDuration($duration): Swim {
		$this->duration = $duration;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getWeightAtTime(): int {
		return $this->weightAtTime;
	}

	/**
	 * @param int $weightAtTime
	 * @return Swim
	 */
	public function setWeightAtTime($weightAtTime): Swim {
		$this->weightAtTime = $weightAtTime;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getHeightAtTime(): int {
		return $this->heightAtTime;
	}

	/**
	 * @param int $heightAtTime
	 * @return Swim
	 */
	public function setHeightAtTime($heightAtTime): Swim {
		$this->heightAtTime = $heightAtTime;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getBirthDateAtTime(): DateTime {
		return $this->birthDateAtTime;
	}

	/**
	 * @param DateTime $birthDateAtTime
	 * @return Swim
	 */
	public function setBirthDateAtTime(DateTime $birthDateAtTime): Swim {
		$this->birthDateAtTime = $birthDateAtTime;
		return $this;
	}


}
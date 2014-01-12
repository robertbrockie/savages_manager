<?php
	class SavagePlayer {

		private $id = 0;
		private $number = 0;
		private $name = '';
		private $position = '';
		private $games_played = 0;
		private $goals = 0;
		private $assists = 0;
		private $total_points = 0;
		private $points_per_game = 0;
		private $penalty_minutes = 0;

		public function getId() {
			return $this->id;
		}

		public function setId($value) {
			$this->id = $value;
		}

		public function getNumber() {
			return $this->number;
		}

		public function setNumber($value) {
			$this->number = $value;
		}

		public function getName() {
			return $this->name;
		}

		public function setName($value) {
			$this->name = $value;
		}

		public function getPosition() {
			return $this->position;
		}

		public function setPosition($value) {
			$this->position = $value;
		}

		public function getGamesPlayed() {
			return $this->games_played;
		}

		public function setGamesPlayed($value) {
			$this->games_played = $value;
		}

		public function getGoals() {
			return $this->goals;
		}

		public function setGoals($value) {
			$this->goals = $value;
		}

		public function getAssists() {
			return $this->assists;
		}

		public function setAssists($value) {
			$this->assists = $value;
		}

		public function getTotalPoints() {
			return $this->total_points;
		}

		public function setTotalPoints($value) {
			$this->total_points = $value;
		}

		public function getPointsPerGame() {
			return $this->points_per_game;
		}

		public function setPointsPerGame($value) {
			$this->points_per_game = $value;
		}

		public function getPenaltyMinutes() {
			return $this->penalty_minutes;
		}

		public function setPenaltyMinutes($value) {
			$this->penalty_minutes = $value;
		}
	}
?>
<?php
	class SavageGame {

		private $id = 0;
		private $type = '';
		private $date = '';
		private $time = '';
		private $away_team = '';
		private $away_score = 0;
		private $home_team = '';
		private $home_score = 0;
		private $location = '';

		public function getId() {
			return $this->id;
		}

		public function setId($value) {
			$this->id = $value;
		}

		public function getType() {
			return $this->type;
		}

		public function setType($value) {
			$this->type = $value;
		}

		public function getDate() {
			return $this->date;
		}

		public function setDate($value) {
			$this->date = $value;
		}

		public function getTime() {
			return $this->time;
		}

		public function setTime($value) {
			$this->time = $value;
		}

		public function getAwayTeam() {
			return $this->away_team;
		}

		public function setAwayTeam($value) {
			$this->away_team = $value;
		}

		public function getAwayScore() {
			return $this->away_score;
		}

		public function setAwayScore($value) {
			$this->away_score = $value;
		}

		public function getHomeTeam() {
			return $this->home_team;
		}

		public function setHomeTeam($value) {
			$this->home_team = $value;
		}

		public function getHomeScore() {
			return $this->home_score;
		}

		public function setHomeScore($value) {
			$this->home_score = $value;
		}

		public function getLocation() {
			return $this->location;
		}

		public function setLocation($value) {
			$this->location = $value;
		}
	}
?>
<?php
	class SavageGoalie {

		private $id = 0;
		private $number = 0;
		private $name = '';
		private $games_played = 0;
		private $wins = 0;
		private $loses = 0;
		private $ties = 0;
		private $goals = 0;
		private $assists = 0;
		private $penalty_minutes = 0;
		private $shutouts = 0;
		private $minutes_played = 0;
		private $goals_against = 0;
		private $goals_against_average = 0;
		private $shots_faced = 0;
		private $saves_made = 0;
		private $save_percentage = 0;

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

		public function getGamesPlayed() {
			return $this->games_played;
		}

		public function setGamesPlayed($value) {
			$this->games_played = $value;
		}

		public function getWins() {
			return $this->wins;
		}

		public function setWins($value) {
			$this->wins = $value;
		}

		public function getLoses() {
			return $this->loses;
		}

		public function setLoses($value) {
			$this->loses = $value;
		}

		public function getTies() {
			return $this->ties;
		}

		public function setTies($value) {
			$this->ties = $value;
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

		public function getPenaltyMinutes() {
			return $this->penalty_minutes;
		}

		public function setPenaltyMinutes($value) {
			$this->penalty_minutes = $value;
		}

		public function getShutouts() {
			return $this->shutouts;
		}

		public function setShutouts($value) {
			$this->shutouts = $value;
		}

		public function getMinutesPlayed() {
			return $this->minutes_played;
		}

		public function setMinutesPlayed($value) {
			$this->minutes_played = $value;
		}

		public function getGoalsAgainst() {
			return $this->goals_against;
		}

		public function setGoalsAgainst($value) {
			$this->goals_against = $value;
		}

		public function getGoalsAgainstAverage() {
			return $this->goals_against_average;
		}

		public function setGoalsAgainstAverage($value) {
			$this->goals_against_average = $value;
		}

		public function getShotsFaced() {
			return $this->shots_faced;
		}

		public function setShotsFaced($value) {
			$this->shots_faced = $value;
		}

		public function getSavesMade() {
			return $this->saves_made;
		}

		public function setSavesMade($value) {
			$this->saves_made = $value;
		}

		public function getSavePercentage() {
			return $this->save_percentage;
		}

		public function setSavePercentage($value) {
			$this->save_percentage = $value;
		}
	}
?>
<?php

	/**
	*	SavageScrapper
	*
	*	Used to scrape roaster information and game schedules from
	*	esportsdesk.
	**/

	class SavageScrapper {

		// Team name
		const TEAM_NAME = 'Savages';

		// User agent used by CURL
		const USER_AGENT = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0';

		// Team stats page
		const TEAM_STATS_URL = 'http://esportsdesk.com/leagues/stats_1team.cfm?leagueID=528&teamID=387356&clientID=129';

		// Schedule page
		const TEAM_SCHEDULE_URL = 'http://esportsdesk.com/leagues/schedules.cfm?leagueID=528&clientID=129';

		public function SavageScrapper() {
			$this->COOKIE_FILE = dirname(__FILE__).'/cookie.txt';
			$this->deleteCookies();
		}

		private function deleteCookies() {
			if (is_file($this->COOKIE_FILE)) {
				unlink($this->COOKIE_FILE);
			}
		}

		public function getPlayerStats() {

			$savage_players = array();

			$dom = $this->fetch(self::TEAM_STATS_URL);

			// find the table containing the players
			$boxscore = $dom->find('table[class=boxscores]', 2);

			// find the player rows
			$rows = $boxscore->find('tr[class=boxscores_tables5]');

			foreach ($rows as $row) {
				$savage_player = new SavagePlayer();
				$savage_player->setNumber($row->find('td', 0)->plaintext);
				$savage_player->setName($row->find('td', 1)->plaintext);
				$savage_player->setPosition($row->find('td', 2)->plaintext);
				$savage_player->setGamesPlayed($row->find('td', 3)->plaintext);
				$savage_player->setGoals($row->find('td', 4)->plaintext);
				$savage_player->setAssists($row->find('td', 5)->plaintext);
				$savage_player->setTotalPoints($row->find('td', 6)->plaintext);
				$savage_player->setPointsPerGame($row->find('td', 7)->plaintext);
				$savage_player->setPenaltyMinutes($row->find('td', 8)->plaintext);

				$savage_players[] = $savage_player;
			}

			return $savage_players;
		}

		public function getGoalieStats() {

			$savage_goalies = array();

			$dom = $this->fetch(self::TEAM_STATS_URL);

			// find the table containg the goalies
			$boxscore = $dom->find('table[class=boxscores]', 6);

			// find the goalie rows
			$rows = $boxscore->find('tr[class=boxscores_tables5]');

			foreach ($rows as $row) {
				$savage_goalie = new SavageGoalie();
				$savage_goalie->setNumber($row->find('td', 0)->plaintext);
				$savage_goalie->setName($row->find('td', 1)->plaintext);
				$savage_goalie->setGamesPlayed($row->find('td', 2)->plaintext);
				$savage_goalie->setWins($row->find('td', 3)->plaintext);
				$savage_goalie->setLoses($row->find('td', 4)->plaintext);
				$savage_goalie->setTies($row->find('td', 5)->plaintext);
				$savage_goalie->setGoals($row->find('td', 6)->plaintext);
				$savage_goalie->setAssists($row->find('td', 7)->plaintext);
				$savage_goalie->setPenaltyMinutes($row->find('td', 8)->plaintext);
				$savage_goalie->setShutouts($row->find('td', 9)->plaintext);
				$savage_goalie->setMinutesPlayed($row->find('td', 10)->plaintext);
				$savage_goalie->setGoalsAgainst($row->find('td', 11)->plaintext);
				$savage_goalie->setGoalsAgainstAverage($row->find('td', 12)->plaintext);
				$savage_goalie->setShotsFaced($row->find('td', 13)->plaintext);
				$savage_goalie->setSavesMade($row->find('td', 14)->plaintext);
				$savage_goalie->setSavePercentage($row->find('td', 15)->plaintext);

				$savage_goalies[] = $savage_goalie;
			}

			return $savage_goalies;
		}

		public function getSchedule() {

			$savage_games = array();

			$dom = $this->fetch(self::TEAM_SCHEDULE_URL);

			$rows = $dom->find('tr[valign=top]');

			foreach ($rows as $row) {
				$savage_game = new SavageGame();

				$filter = 'td[class=boxscores_tables4]';

				$savage_game->setType($this->cleanValue($row->find($filter, 0)->plaintext));
				$savage_game->setDate($this->cleanValue($row->find($filter, 1)->plaintext));
				$savage_game->setTime($this->cleanValue($row->find($filter, 4)->plaintext));
				$savage_game->setAwayTeam($this->cleanValue($row->find($filter, 5)->plaintext));
				$savage_game->setAwayScore($this->cleanValue($row->find($filter, 6)->plaintext));
				
				// try and find the home team name
				$sub_row = $row->find($filter, 7);
				if ($sub_row) {
					$savage_game->setHomeTeam($this->cleanValue($sub_row->find('a', 0)->plaintext));
				}

				$savage_game->setHomeScore($this->cleanValue($row->find($filter, 8)->plaintext));
				$savage_game->setLocation($this->cleanValue($row->find($filter, 9)->plaintext));

				// only care about savages games for now
				if($this->isSavageGame($savage_game)) {
					$savage_games[] = $savage_game;	
				}
			}

			return $savage_games;
		}

		public function fetch($url) {
			$dom = file_get_html($url);
			
			return $dom;
		}

		private function cleanValue($value) {
			$value = trim($value);

			switch ($value) {
				case '&nbsp;':
					return '';
				default:
					return $value;
			}
		}

		private function isSavageGame($game) {
			return $game->getAwayTeam() == self::TEAM_NAME ||
					$game->getHomeTeam() == self::TEAM_NAME;
		}
	}
?>
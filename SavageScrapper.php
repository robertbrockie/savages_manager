<?php

	/**
	*	SavageScrapper
	*
	*	Used to scrape roaster information and game schedules from
	*	esportsdesk.
	**/

	class SavageScrapper {

		// User agent used by CURL
		const USER_AGENT = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0';

		// Team stats page
		const TEAM_STATS_PAGE = 'http://esportsdesk.com/leagues/stats_1team.cfm?leagueID=528&teamID=387356&clientID=129';

		// This cannot be a const for some reason, probably because of the dirname() function
		private $COOKIE_FILE;

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
			$dom = $this->fetch(self::TEAM_STATS_PAGE);

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
			}
		}

		public function getGoalieStats() {
			$dom = $this->fetch(self::TEAM_STATS_PAGE);

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

				print_r($savage_goalie);
			} 
		}

		public function fetch($url) {
			$dom = file_get_html($url);
			
			return $dom;
		}
	}
?>
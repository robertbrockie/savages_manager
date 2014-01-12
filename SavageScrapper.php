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

		public function getRoaster() {
			$dom = $this->fetch(self::TEAM_STATS_PAGE);

			// find the table containing the players
			$boxscore = $dom->find('table[class=boxscores]', 2);

			// find the player rows
			$players = $boxscore->find('tr[class=boxscores_tables5]');

			foreach ($players as $player) {
				$savage_player = new SavagePlayer();
				$savage_player->setNumber($player->find('td', 0)->plaintext);
				$savage_player->setName($player->find('td', 1)->plaintext);
				$savage_player->setPosition($player->find('td', 2)->plaintext);
				$savage_player->setGamesPlayed($player->find('td', 3)->plaintext);
				$savage_player->setGoals($player->find('td', 4)->plaintext);
				$savage_player->setAssists($player->find('td', 5)->plaintext);
				$savage_player->setTotalPoints($player->find('td', 6)->plaintext);
				$savage_player->setPointsPerGame($player->find('td', 7)->plaintext);
				$savage_player->setPenaltyMinutes($player->find('td', 8)->plaintext);

				print_r($savage_player);
			}
		}

		public function fetch($url) {
			$dom = file_get_html($url);
			
			return $dom;
		}
	}
?>
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

			$boxscores = $dom->find('table[class=boxscores]');

			echo 'found '.count($boxscores).' tables!'."\n";


		}

		public function fetch($url) {
			$dom = file_get_html($url);
			
			return $dom;
		}
	}
?>
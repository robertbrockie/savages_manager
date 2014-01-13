<?php

	include('SimpleHtmlDom.php');
	include('SavageScrapper.php');
	include('SavagePlayer.php');
	include('SavageGoalie.php');
	include('SavageGame.php');

	$savage_scrapper = new SavageScrapper();

	$savage_games = $savage_scrapper->getSchedule();
	print_r($savage_games);

?>